// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BigButton from 'components/big-button';
import BeatmapExtendedJson from 'interfaces/beatmap-extended-json';
import BeatmapsetExtendedJson from 'interfaces/beatmapset-extended-json';
import { route } from 'laroute';
import core from 'osu-core-singleton';
import * as React from 'react';
import { beatmapDownloadDirect } from 'utils/url';
import BeatmapsetMenu from './beatmapset-menu';

interface Props {
  beatmapset: BeatmapsetExtendedJson;
  currentBeatmap: BeatmapExtendedJson;
  favcount: number;
  hasFavourited: boolean;
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
  osuDirect = false,
  topTextKey = '_',
}: DownloadButtonProps) => (
  <BigButton
    extraClasses={!osuDirect ? ['js-beatmapset-download-link'] : undefined}
    href={href}
    modifiers={['beatmapset-toolbar']}
    props={{
      'data-turbolinks': false,
    }}
    text={{
      bottom: bottomTextKey && osu.trans(`beatmapsets.show.details.download.${bottomTextKey}`),
      top: osu.trans(`beatmapsets.show.details.download.${topTextKey}`),
    }}
  />
);

export default class Toolbar extends React.PureComponent<Props> {
  render() {
    return (
      <div className='beatmapset-toolbar'>
        <div className='beatmapset-toolbar__count'>
          <div>
            <div>
              {osu.trans('beatmapsets.show.details.count.total_play')}
            </div>
            <div className='beatmapset-toolbar__count-value'>
              {osu.formatNumber(this.props.beatmapset.play_count)}
            </div>
          </div>

          <div>
            <div>
              {osu.trans('beatmapsets.show.details.count.diff_play')}
            </div>
            <div className='beatmapset-toolbar__count-value'>
              {osu.formatNumber(this.props.currentBeatmap.playcount)}
            </div>
          </div>
        </div>

        <div className='beatmapset-toolbar__buttons'>
          {this.renderFavouriteButton()}
          {this.renderDownloadButtons()}
          {this.renderDiscussionButtons()}
          {this.renderLoginButton()}
          {this.renderMenuButton()}
        </div>
      </div>
    );
  }

  private renderDiscussionButtons() {
    if (this.props.beatmapset.discussion_enabled) {
      return (
        <BigButton
          href={route('beatmapsets.discussion', { beatmapset: this.props.beatmapset.id })}
          modifiers={['beatmapset-toolbar']}
          text={osu.trans('beatmapsets.show.discussion')}
        />
      );
    }

    if (this.props.beatmapset.legacy_thread_url !== null) {
      return (
        <BigButton
          href={this.props.beatmapset.legacy_thread_url}
          modifiers={['beatmapset-toolbar']}
          text={osu.trans('beatmapsets.show.discussion')}
        />
      );
    }
  }

  private renderDownloadButtons() {
    if (core.currentUser != null && !this.props.beatmapset.availability?.download_disabled) {
      return (
        <>
          {this.props.beatmapset.video ? (
            <>
              <DownloadButton
                key='video'
                bottomTextKey='video'
                href={route('beatmapsets.download', { beatmapset: this.props.beatmapset.id })}
              />
              <DownloadButton
                key='no-video'
                bottomTextKey='no-video'
                href={route('beatmapsets.download', { beatmapset: this.props.beatmapset.id, noVideo: 1 })}
              />
            </>
          ) : (
            <DownloadButton
              key='default'
              href={route('beatmapsets.download', { beatmapset: this.props.beatmapset.id })}
            />
          )}

          <DownloadButton
            key='direct'
            href={core.currentUser.is_supporter
              ? beatmapDownloadDirect(this.props.currentBeatmap.id)
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
    const action = this.props.hasFavourited ? 'unfavourite' : 'favourite';
    const icon = `${this.props.hasFavourited ? 'fas' : 'far'} fa-heart`;

    return (
      <button
        className='btn-osu-big btn-osu-big--beatmapset-favourite btn-osu-big--pink'
        onClick={this.toggleFavourite}
        title={osu.trans(`beatmapsets.show.details.${action}`)}
      >
        <i className={icon} />
        {' '}
        {osu.formatNumber(this.props.favcount)}
      </button>
    );
  }

  private renderLoginButton() {
    if (core.currentUser == null) {
      return (
        <BigButton
          extraClasses={['js-user-link']}
          modifiers={['beatmapset-toolbar']}
          text={{
            bottom: osu.trans('beatmapsets.show.details.login_required.bottom'),
            top: osu.trans('beatmapsets.show.details.login_required.top'),
          }}
        />
      );
    }
  }

  private renderMenuButton() {
    if (core.currentUser != null && core.currentUser.id !== this.props.beatmapset.user_id) {
      return (
        <div className='beatmapset-toolbar__menu'>
          <div className='btn-circle btn-circle--page-toggle'>
            <BeatmapsetMenu beatmapset={this.props.beatmapset} />
          </div>
        </div>
      );
    }
  }

  private toggleFavourite = () => {
    if (core.userLogin.showIfGuest(this.toggleFavourite)) {
      return;
    }

    $.publish('beatmapset:favourite:toggle');
  };
}
