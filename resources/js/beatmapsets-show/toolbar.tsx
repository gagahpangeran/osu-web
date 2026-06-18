// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BigButton from 'components/big-button';
import { route } from 'laroute';
import { observer } from 'mobx-react';
import core from 'osu-core-singleton';
import * as React from 'react';
import { toggleFavourite } from 'utils/beatmapset-helper';
import { formatNumber } from 'utils/html';
import { trans } from 'utils/lang';
import { present } from 'utils/string';
import { beatmapDownloadDirect } from 'utils/url';
import BeatmapsetMenu from './beatmapset-menu';
import Controller from './controller';

interface Props {
  controller: Controller;
}

interface DownloadButtonProps {
  bottomTextKey?: string;
  href: string;
  icon?: string;
  osuDirect?: boolean;
  topTextKey?: string;
}

const DownloadButton = ({
  bottomTextKey,
  href,
  topTextKey = '_',
}: DownloadButtonProps) => (
  <BigButton
    href={href}
    modifiers='beatmapset-toolbar'
    props={{
      'data-turbolinks': false,
    }}
    text={{
      bottom: present(bottomTextKey) ? trans(`beatmapsets.show.details.download.${bottomTextKey}`) : undefined,
      top: trans(`beatmapsets.show.details.download.${topTextKey}`),
    }}
  />
);

@observer
export default class Toolbar extends React.Component<Props> {
  private get controller() {
    return this.props.controller;
  }

  render() {
    return (
      <div className='beatmapset-toolbar'>
        <div className='beatmapset-toolbar__count'>
          <div>
            <div>
              {trans('beatmapsets.show.details.count.total_play')}
            </div>
            <div className='beatmapset-toolbar__count-value'>
              {formatNumber(this.controller.beatmapset.play_count)}
            </div>
          </div>

          <div>
            <div>
              {trans('beatmapsets.show.details.count.diff_play')}
            </div>
            <div className='beatmapset-toolbar__count-value'>
              {formatNumber(this.controller.currentBeatmap.playcount)}
            </div>
          </div>
        </div>

        <div className='beatmapset-toolbar__buttons'>
          {this.renderFavouriteButton()}
          {this.renderDownloadButtons()}
          {this.renderLoginButton()}
          {this.renderMenuButton()}
        </div>
      </div>
    );
  }

  private renderDownloadButtons() {
    if (core.currentUser != null && !this.controller.beatmapset.availability.download_disabled) {
      return (
        <>
          {this.controller.beatmapset.video ? (
            <>
              <DownloadButton
                bottomTextKey='video'
                href={route('beatmapsets.download', { beatmapset: this.controller.beatmapset.id })}
              />
              <DownloadButton
                bottomTextKey='no-video'
                href={route('beatmapsets.download', { beatmapset: this.controller.beatmapset.id, noVideo: 1 })}
              />
            </>
          ) : (
            <DownloadButton
              href={route('beatmapsets.download', { beatmapset: this.controller.beatmapset.id })}
            />
          )}

          <DownloadButton
            href={core.currentUser.is_supporter
              ? beatmapDownloadDirect(this.controller.currentBeatmap.id)
              : route('support-the-game')
            }
            osuDirect
            topTextKey='direct'
          />
        </>
      );
    }
  }

  private renderFavouriteButton() {
    const button = this.controller.beatmapset.has_favourited
      ? {
        action: 'unfavourite',
        icon: 'fas fa-heart',
      } : {
        action: 'favourite',
        icon: 'far fa-heart',
      };

    return (
      <button
        className='btn-osu-big btn-osu-big--beatmapset-favourite btn-osu-big--pink'
        onClick={this.toggleFavourite}
        title={trans(`beatmapsets.show.details.${button.action}`)}
      >
        <i className={button.icon} />
        {' '}
        {formatNumber(this.controller.beatmapset.favourite_count)}
      </button>
    );
  }

  private renderLoginButton() {
    if (core.currentUser == null) {
      return (
        <BigButton
          extraClasses={['js-user-link']}
          modifiers='beatmapset-toolbar'
          text={{
            bottom: trans('beatmapsets.show.details.login_required.bottom'),
            top: trans('beatmapsets.show.details.login_required.top'),
          }}
        />
      );
    }
  }

  private renderMenuButton() {
    if (!this.controller.beatmapset.is_scoreable && core.currentUser != null && core.currentUser.id !== this.controller.beatmapset.user_id) {
      return (
        <div className='beatmapset-toolbar__menu'>
          <div className='btn-circle btn-circle--page-toggle'>
            <BeatmapsetMenu beatmapset={this.controller.beatmapset} />
          </div>
        </div>
      );
    }
  }

  private readonly toggleFavourite = () => {
    toggleFavourite(this.controller.beatmapset);
  };
}
