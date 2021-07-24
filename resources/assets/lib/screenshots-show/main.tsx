// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import HeaderV4 from 'header-v4';
import ScreenshotJson from 'interfaces/screenshot-json';
import * as React from 'react';
import TimeWithTooltip from 'time-with-tooltip';
import { UserLink } from 'user-link';

interface Props {
  screenshot: ScreenshotJson;
}

export default function Main(props: Props) {
  return (
    <>
      <HeaderV4 />

      <div className='osu-page osu-page--generic-compact'>
        <div className='screenshot-show'>
          <div className='screenshot-show__header'>
            <h1 className='screenshot-show__title'>
              {props.screenshot.title}
            </h1>
            <div className='screenshot-show__detail'>
              Uploaded by{' '}
              <UserLink user={props.screenshot.user} />{' '}
              at{' '}
              <TimeWithTooltip dateTime={props.screenshot.created_at} relative />
            </div>
          </div>
          <div className='screenshot-show__content'>
            <img
              alt={props.screenshot.title}
              className='screenshot-show__image'
              src={props.screenshot.image_url ?? ''}
            />
          </div>
        </div>
      </div>
    </>
  );
}
