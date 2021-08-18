// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import DifficultyBadge from 'difficulty-badge';
import BeatmapJsonExtended from 'interfaces/beatmap-json-extended';
import BeatmapsetExtendedJson from 'interfaces/beatmapset-extended-json';
import { padStart } from 'lodash';
import * as React from 'react';
import { StringWithComponent } from 'string-with-component';
import { UserLink } from 'user-link';
import { getBeatmapMapper } from 'utils/beatmap-helper';
import CountBadge from './count-badge';
import Extra from './extra';
import Metadata from './metadata';
import Stats from './stats';

interface Props {
  beatmapset: BeatmapsetExtendedJson;
  currentBeatmap: BeatmapJsonExtended;
  hoveredBeatmap: BeatmapJsonExtended | null;
}

// value is in second
function formatDuration(value: number) {
  const s = value % 60;
  const m = Math.floor(value / 60) % 60;
  const h = Math.floor(value / 3600);

  if (h > 0) {
    return `${h}:${padStart(String(m), 2, '0')}:${padStart(String(s), 2, '0')}`;
  } else {
    return `${m}:${padStart(String(s), 2, '0')}`;
  }
}

export default class Header extends React.PureComponent<Props> {
  render() {
    const showedBeatmap = this.props.hoveredBeatmap ?? this.props.currentBeatmap;
    const mapper = getBeatmapMapper(this.props.beatmapset, showedBeatmap);

    return (
      <div className='beatmapset-info'>
        <div className='beatmapset-info__item beatmapset-info__item--diff'>
          <div className='beatmapset-info__diff-detail u-ellipsis-overflow'>
            <div className='beatmapset-info__diff-icon'>
              <i className={`fal fa-extra-mode-${showedBeatmap.mode}`} />
            </div>

            <DifficultyBadge modifiers='beatmapset-info' rating={showedBeatmap.difficulty_rating} />

            <div className='u-ellipsis-overflow'>
              <span className='beatmapset-info__diff-name'>
                {showedBeatmap.version}
              </span>
              {' '}
              <span className='beatmapset-info__diff-mapper'>
                <StringWithComponent
                  mappings={{
                    ':mapper':
                      <UserLink
                        key='mapper'
                        user={{ id: mapper.id, username: mapper.username }}
                      />,
                  }}
                  pattern={osu.trans('beatmapsets.show.details.mapped_by')}
                />
              </span>
            </div>
          </div>

          <CountBadge
            data={{
              length: formatDuration(this.props.currentBeatmap.total_length),
              song_bpm: this.props.currentBeatmap.bpm > 1000 ? '∞' : osu.formatNumber(this.props.currentBeatmap.bpm),
            }}
            modifiers='length-bpm'
          />
        </div>

        <div className='beatmapset-info__item beatmapset-info__item--stats'>
          <Metadata beatmapset={this.props.beatmapset} />
          <div className='beatmapset-info__line' />
          <Stats beatmap={this.props.currentBeatmap} />
          <div className='beatmapset-info__line beatmapset-info__line--mobile' />
          <Extra beatmap={this.props.currentBeatmap} beatmapset={this.props.beatmapset} />
        </div>
      </div>
    );
  }
}
