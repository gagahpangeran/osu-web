// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import FlagCountry from 'flag-country';
import BeatmapJson from 'interfaces/beatmap-json';
import ScoreJson from 'interfaces/score-json';
import ScoreboardType from 'interfaces/scoreboard-type';
import { route } from 'laroute';
import Mod from 'mod';
import { PlayDetailMenu } from 'play-detail-menu';
import * as React from 'react';
import { hasMenu } from 'score-helper';
import ScoreboardTime from 'scoreboard-time';
import PpValue from 'scores/pp-value';
import { UserLink } from 'user-link';
import { classWithModifiers, Modifiers } from 'utils/css';
import { modeAttributesMap } from 'utils/score';

interface TdLinkProps {
  children: React.ReactNode;
  href: string;
  modifiers?: Modifiers;
}

interface Props {
  activated: boolean;
  beatmap: BeatmapJson;
  index: number;
  score: ScoreJson;
  scoreboardType: ScoreboardType;
  showPp: boolean;
}

const TdLink = (props: TdLinkProps) => (
  <td className='beatmap-scoreboard-table__cell'>
    <a
      className={classWithModifiers('beatmap-scoreboard-table__cell-content', props.modifiers)}
      href={props.href}
    >
      {props.children}
    </a>
  </td>
);

export default class ScoreboardTableRow extends React.PureComponent<Props> {
  render() {
    const classModifiers = {
      first: this.props.index === 0,
      friend: this.props.scoreboardType !== 'friend' && osu.currentUserIsFriendsWith(this.props.score.user_id),
      highlightable: !this.props.activated,
      'menu-active': this.props.activated,
      self: this.props.score.user_id === currentUser.id,
    };

    const href = route('scores.show', { mode: this.props.score.mode, score: this.props.score.id });

    return (
      <tr className={classWithModifiers('beatmap-scoreboard-table__body-row', classModifiers)}>
        <TdLink href={href} modifiers='rank'>#{this.props.index + 1}</TdLink>

        <TdLink href={href} modifiers='grade'>
          <div className={classWithModifiers('score-rank', 'tiny', this.props.score.rank)} />
        </TdLink>

        <TdLink href={href} modifiers='score'>{osu.formatNumber(this.props.score.score)}</TdLink>

        <TdLink href={href} modifiers={{ perfect: this.props.score.accuracy === 1 }}>
          {osu.formatNumber(this.props.score.accuracy * 100, 2)}%
        </TdLink>

        <TdLink
          href={route('rankings', {
            country: this.props.score.user.country_code,
            mode: this.props.beatmap.mode,
            type: 'performance',
          })}
        >
          <FlagCountry country={this.props.score.user.country} modifiers='flat' />
        </TdLink>

        <td className='beatmap-scoreboard-table__cell u-relative'>
          <UserLink
            className='beatmap-scoreboard-table__cell-content beatmap-scoreboard-table__cell-content--user-link'
            user={this.props.score.user}
          />
          <a className='beatmap-scoreboard-table__cell-content' href={href} />
        </td>

        <TdLink href={href} modifiers={{ perfect: this.props.score.max_combo === this.props.beatmap.max_combo }}>
          {osu.formatNumber(this.props.score.max_combo)}x
        </TdLink>

        {modeAttributesMap[this.props.beatmap.mode].map((attr) => (
          <TdLink key={attr.attribute} href={href} modifiers={{ zero: this.props.score.statistics[attr.attribute] === 0 }}>
            {osu.formatNumber(this.props.score.statistics[attr.attribute])}
          </TdLink>
        ))}

        {this.props.showPp && (
          <TdLink href={href}>
            <PpValue score={this.props.score} />
          </TdLink>
        )}

        <TdLink href={href} modifiers='time'>
          <ScoreboardTime dateTime={this.props.score.created_at} />
        </TdLink>

        <TdLink href={href} modifiers='mods'>
          <div className='beatmap-scoreboard-table__mods'>
            {this.props.score.mods.map((mod) => <Mod key={mod} mod={mod} />)}
          </div>
        </TdLink>

        <td className='beatmap-scoreboard-table__popup-menu'>
          {hasMenu(this.props.score) && <PlayDetailMenu score={this.props.score} />}
        </td>
      </tr>
    );
  }
}
