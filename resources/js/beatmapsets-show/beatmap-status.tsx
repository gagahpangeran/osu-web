// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import BeatmapJson from 'interfaces/beatmap-json';
import * as React from 'react';
import { trans } from 'utils/lang';
import { wikiUrl } from 'utils/url';

interface Props {
  beatmap: BeatmapJson;
}

export default function BeatmapStatus(props: Props) {
  const { status } = props.beatmap;

  return (
    <a
      className='beatmapset-status beatmapset-status--cover'
      href={statusToWikiLink(status)}
      style={{
        '--bg': `var(--beatmapset-${status}-bg-hsl)`,
        '--colour': `var(--beatmapset-${status}-colour)`,
      } as React.CSSProperties}
    >
      {trans(`beatmapsets.show.status.${status}`)}
    </a>
  );
}

function statusToWikiLink(status: string): string {
  let fragment: string;
  if (status === 'wip' || status === 'pending') {
    fragment = 'wip-and-pending';
  } else {
    fragment = status;
  }
  return wikiUrl(`Beatmap/Category#${fragment}`);
}
