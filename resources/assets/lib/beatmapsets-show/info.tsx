// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import { BeatmapIcon } from 'beatmap-icon';
import BeatmapJsonExtended from 'interfaces/beatmap-json-extended';
import BeatmapsetExtendedJson from 'interfaces/beatmapset-extended-json';
import * as _ from 'lodash';
import * as React from 'react';
import { StringWithComponent } from 'string-with-component';
import { UserLink } from 'user-link';
import { getDiffRating } from 'utils/beatmap-helper';
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
    return `${h}:${_.padStart(String(m), 2, '0')}:${_.padStart(String(s), 2, '0')}`;
  } else {
    return `${m}:${_.padStart(String(s), 2, '0')}`;
  }
}

export default class Header extends React.PureComponent<Props> {
  render() {
    const showedBeatmap = this.props.hoveredBeatmap ?? this.props.currentBeatmap;

    return (
      <div className='beatmapset-info'>
        <div className='beatmapset-info__item beatmapset-info__item--diff'>
          <div className='beatmapset-info__diff-item beatmapset-info__diff-item--details'>
            <BeatmapIcon
              beatmap={showedBeatmap}
              modifier='beatmapset-info'
              showTitle={false}
            />

            <div
              className='beatmapset-info__star-difficulty'
              style={{
                '--bg': `var(--diff-${getDiffRating(showedBeatmap.difficulty_rating)})`,
              } as React.CSSProperties}
            >
              <i className='fas fa-star' />{' '}
              {osu.formatNumber(showedBeatmap.difficulty_rating, 2)}
            </div>

            <div className='beatmapset-info__diff-name'>
              {showedBeatmap.version}
            </div>

            <div className='beatmapset-info__diff-mapper'>
              <StringWithComponent
                mappings={{
                  ':mapper':
                    <UserLink
                      key='mapper'
                      user={{ id: this.props.beatmapset.user_id, username: this.props.beatmapset.creator }}
                    />,
                }}
                pattern={osu.trans('beatmapsets.show.details.mapped_by')}
              />
            </div>
          </div>

          <div className='beatmapset-info__diff-item beatmapset-info__diff-item--length-bpm'>
            <div>
              <StringWithComponent
                mappings={{
                  ':length':
                    <span key='length' className='beatmapset-info__length-bpm-value'>
                      {formatDuration(this.props.currentBeatmap.total_length)}
                    </span>,
                }}
                pattern={osu.trans('beatmapsets.show.details.length')}
              />
            </div>

            <div>
              <StringWithComponent
                mappings={{
                  ':bpm':
                    <span key='bpm' className='beatmapset-info__length-bpm-value'>
                      {
                        this.props.currentBeatmap.bpm > 1000
                          ? '∞'
                          : osu.formatNumber(this.props.currentBeatmap.bpm)
                      }
                    </span>,
                }}
                pattern={osu.trans('beatmapsets.show.details.bpm')}
              />
            </div>
          </div>
        </div>

        <div className='beatmapset-info__item beatmapset-info__item--stats'>
          <Metadata beatmapset={this.props.beatmapset} />
          <Stats beatmap={this.props.currentBeatmap} />
          <Extra beatmap={this.props.currentBeatmap} beatmapset={this.props.beatmapset} />
        </div>
      </div>
    );
  }
}
