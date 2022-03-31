// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import DifficultyBadge from 'components/difficulty-badge';
import StringWithComponent from 'components/string-with-component';
import { UserLink } from 'components/user-link';
import BeatmapExtendedJson from 'interfaces/beatmap-extended-json';
import { BeatmapsetJsonForShow } from 'interfaces/beatmapset-extended-json';
import { padStart } from 'lodash';
import * as React from 'react';
import CountBadge from './count-badge';
import Extra from './extra';
import Metadata from './metadata';
import Stats from './stats';

interface Props {
  beatmapset: BeatmapsetJsonForShow;
  currentBeatmap: BeatmapExtendedJson;
  hoveredBeatmap: BeatmapExtendedJson | null;
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
                    mapper:
                      <UserLink
                        user={{ id: showedBeatmap.user?.id, username: showedBeatmap.user?.username ?? '' }}
                      />,
                  }}
                  pattern={osu.trans('beatmapsets.show.details.mapped_by')}
                />
              </span>
            </div>
          </div>

          <CountBadge
            data={{
              length: formatDuration(showedBeatmap.total_length),
              song_bpm: showedBeatmap.bpm > 1000 ? '∞' : osu.formatNumber(showedBeatmap.bpm),
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
