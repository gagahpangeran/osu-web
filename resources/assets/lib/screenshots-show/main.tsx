// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import HeaderV4 from 'header-v4';
import ScreenshotJson from 'interfaces/screenshot-json';
import * as React from 'react';
import { StringWithComponent } from 'string-with-component';
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
              <StringWithComponent
                mappings={{
                  ':timeago': <TimeWithTooltip key='timeago' dateTime={props.screenshot.created_at} relative />,
                  ':user': <UserLink key='user' user={props.screenshot.user} />,
                }}
                pattern={osu.trans('screenshots.show.uploaded_by')}
              />
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
