// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { BeatmapsetJson } from 'beatmapsets/beatmapset-json';
import BeatmapJsonExtended from 'interfaces/beatmap-json-extended';
import BeatmapsetExtendedJson from 'interfaces/beatmapset-extended-json';
import { route } from 'laroute';
import { observer } from 'mobx-react';
import * as React from 'react';
import { StringWithComponent } from 'string-with-component';
import { UserLink } from 'user-link';
import { getArtist, getTitle } from 'utils/beatmap-helper';
import { classWithModifiers } from 'utils/css';
import BeatmapList from './beatmap-list';
import BeatmapPicker from './beatmap-picker';

interface Props {
  beatmaps: BeatmapJsonExtended[];
  beatmapset: BeatmapsetExtendedJson;
  currentBeatmap: BeatmapJsonExtended;
}

export default class Header extends React.PureComponent<Props> {
  render() {
    const expanded = core.userPreferences.get('beatmapset_cover_expanded');
    const beatmaps = this.props.beatmaps.get(this.props.currentBeatmap.mode) ?? [];

    return (
      <div className='beatmapset-header'>
        <div className='beatmapset-header__status'>
          <div
            className='beatmapset-status beatmapset-status--panel'
            style={{
              '--bg': `var(--beatmapset-${this.props.currentBeatmap.status}-bg)`,
              '--colour': `var(--beatmapset-${this.props.currentBeatmap.status}-colour)`,
            } as React.CSSProperties}
          >
            {osu.trans(`beatmapsets.show.status.${this.props.currentBeatmap.status}`)}
          </div>
        </div>

        <div className='beatmapset-header__title-container u-ellipsis-overflow'>
          <div className='beatmapset-header__title u-ellipsis-overflow'>
            <a
              className='beatmapset-header__text-link'
              href={route('beatmapsets.index', { q: getTitle(this.props.beatmapset) })}
            >
              {getTitle(this.props.beatmapset)}
            </a>
          </div>

          <div className='beatmapset-header__artist u-ellipsis-overflow'>
            <StringWithComponent
              mappings={{
                ':artist':
                  <a
                    key='artist'
                    className='beatmapset-header__text-link'
                    href={route('beatmapsets.index', { q: getArtist(this.props.beatmapset) })}
                  >
                    {getArtist(this.props.beatmapset)}
                  </a>,
              }}
              pattern={osu.trans('beatmapsets.show.details.by_artist')}
            />
          </div>
        </div>


        <div className='beatmapset-header__creator'>
          <StringWithComponent
            mappings={{
              ':creator':
                <UserLink
                  key='creator'
                  user={{ id: this.props.beatmapset.user_id, username: this.props.beatmapset.creator }}
                />,
            }}
            pattern={osu.trans('beatmapsets.show.details.created_by')}
          />
        </div>

        <div className='beatmapset-header__chooser'>
          <div className='beatmapset-header__chooser-list'>
            <BeatmapList
              beatmaps={this.props.beatmaps}
              beatmapset={this.props.beatmapset}
              currentBeatmap={this.props.currentBeatmap}
              large={false}
              modifiers={['beatmapset-show']}
              onSelectBeatmap={this.onSelectBeatmap}
            />
          </div>

          <div className='beatmapset-header__details-item beatmapset-header__details-item--picker'>
            <BeatmapList
              beatmaps={beatmaps}
              currentBeatmap={this.props.currentBeatmap}
              type='show'
            />
            <BeatmapPicker
              beatmaps={beatmaps}
              currentBeatmap={this.props.currentBeatmap}
            />
          </div>
        </div>
      </div>
    );
  }

  private onSelectBeatmap = (beatmapId: number) => {
    const selectedBeatmap = this.props.beatmaps.find((beatmap) => beatmap.id === beatmapId);

    $.publish('beatmapset:beatmap:set', { beatmap: selectedBeatmap });
  };
}
