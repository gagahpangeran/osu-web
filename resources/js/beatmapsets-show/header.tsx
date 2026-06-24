// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BeatmapsetBadge from 'components/beatmapset-badge';
import StringWithComponent from 'components/string-with-component';
import UserLink from 'components/user-link';
import { route } from 'laroute';
import { observer } from 'mobx-react';
import * as React from 'react';
import { downloadLimited, getArtist, getTitle, makeSearchQueryOption } from 'utils/beatmapset-helper';
import { trans } from 'utils/lang';
import { wikiUrl } from 'utils/url';
import BeatmapPicker from './beatmap-picker';
import BeatmapStatus from './beatmap-status';
import Controller from './controller';

interface Props {
  controller: Controller;
}

@observer
export default class Header extends React.Component<Props> {
  private get controller() {
    return this.props.controller;
  }

  render() {
    return (
      <div className='beatmapset-header'>
        {this.renderAvailabilityInfo()}

        <div className='beatmapset-header__status'>
          <BeatmapStatus beatmap={this.controller.currentBeatmap} />

          <BeatmapsetBadge
            beatmapset={this.controller.beatmapset}
            modifiers='cover'
            type='nsfw'
          />

          <BeatmapsetBadge
            beatmapset={this.controller.beatmapset}
            modifiers='cover'
            type='spotlight'
          />
        </div>

        <div className='beatmapset-header__title-container u-ellipsis-overflow'>
          <div className='beatmapset-header__title u-ellipsis-overflow'>
            <a
              className='beatmapset-header__text-link'
              href={route('beatmapsets.index', { q: makeSearchQueryOption('title', getTitle(this.controller.beatmapset)) })}
            >
              {getTitle(this.controller.beatmapset)}
            </a>
          </div>

          <div className='beatmapset-header__artist u-ellipsis-overflow'>
            <StringWithComponent
              mappings={{
                artist:
                  <a
                    className='beatmapset-header__text-link'
                    href={route('beatmapsets.index', { q: getArtist(this.controller.beatmapset) })}
                  >
                    {getArtist(this.controller.beatmapset)}
                  </a>,
              }}
              pattern={trans('beatmapsets.show.details.by_artist')}
            />

            <BeatmapsetBadge
              beatmapset={this.controller.beatmapset}
              type='featured_artist'
            />
          </div>
        </div>

        <div className='beatmapset-header__creator'>
          <StringWithComponent
            mappings={{
              creator:
                <UserLink
                  user={{ id: this.controller.beatmapset.user_id, username: this.controller.beatmapset.creator }}
                />,
            }}
            pattern={trans('beatmapsets.show.details.created_by')}
          />
        </div>

        <div className='beatmapset-header__chooser'>
          <div className='beatmapset-header__chooser-picker'>
            <BeatmapPicker controller={this.controller} />
          </div>
        </div>
      </div>
    );
  }

  private renderAvailabilityInfo() {
    if (!downloadLimited(this.controller.beatmapset)) return;

    let label: string;
    let href: string | null;

    if (this.controller.beatmapset.availability.download_disabled) {
      label = trans('beatmapsets.availability.disabled');
    } else {
      if (this.controller.beatmapset.availability.more_information === 'rule_violation') {
        label = trans('beatmapsets.availability.rule_violation');
        href = `${wikiUrl('Rules')}#beatmap-submission-rules`;
      } else {
        label = trans('beatmapsets.availability.parts-removed');
      }
    }

    href ??= this.controller.beatmapset.availability.more_information;

    return (
      <div className='beatmapset-header__availability-info'>
        {label}

        {href != null &&
          <div className='beatmapset-header__availability-link'>
            <a href={href} rel="noreferrer" target='_blank'>
              {trans('beatmapsets.availability.more-info')}
            </a>
          </div>
        }
      </div>
    );
  }
}
