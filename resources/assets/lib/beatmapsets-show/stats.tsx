// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BeatmapExtendedJson from 'interfaces/beatmap-extended-json';
import * as React from 'react';
import { StringWithComponent } from 'string-with-component';

interface Props {
  beatmap: BeatmapExtendedJson;
}

export default class Stats extends React.PureComponent<Props> {
  private get stastKey(): (keyof BeatmapExtendedJson)[] {
    switch (this.props.beatmap.mode) {
      case 'mania':
        return ['cs', 'drain', 'accuracy', 'difficulty_rating'] as const;
      case 'taiko':
        return ['drain', 'accuracy', 'difficulty_rating'] as const;
      default:
        return ['cs', 'drain', 'accuracy', 'ar', 'difficulty_rating'] as const;
    }
  }

  render() {
    return (
      <div className='beatmapset-stats'>
        <div className='beatmapset-stats__count'>
          <CountBadge
            data={{
              circle_count: osu.formatNumber(this.props.beatmap.count_circles),
              slider_count: osu.formatNumber(this.props.beatmap.count_sliders),
            }}
          />
        </div>

        {this.statsKey.map((key) => (
          <React.Fragment key={key}>
            {this.renderStat(key, this.props.beatmap[key])}
          </React.Fragment>
        ))}
      </div>
    );
  }

  private renderStat = (stat: keyof BeatmapExtendedJson) => {
    let label = stat;
    if (this.props.beatmap.mode === 'mania' && stat === 'cs') {
      label += '-mania';
    }

    return (
      <>
        {addSpacer && <div className='beatmapset-stats__spacer' />}
        <div>{osu.trans(`beatmapsets.show.stats.${label}`)}</div>
        <div className='beatmapset-stats__value'>
          {osu.formatNumber(value)}
        </div>
        <div className='beatmapset-stats__bar-container'>
          <div className='beatmapset-bar'>
            <div
              className='beatmapset-bar__fill'
              style={{
                width: `${10 * Math.min(10, Number(this.props.beatmap[stat]))}%`,
              }}
            />
          </div>
        </div>
      </>
    );
  };
}
