// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import ScreenshotJson from 'interfaces/screenshot-json';
import * as React from 'react';

interface Props {
  index: number;
  screenshot: ScreenshotJson;
}

export function Thumbnail(props: Props) {
  return (
    <div className='user-gallery-thumbnail'>
      <div
        className='user-gallery-thumbnail__image-container js-gallery'
        data-gallery-id='screenshot'
        data-height='1080'
        data-index={`${props.index}`}
        data-src={props.screenshot.image_url}
        data-width='1920'
      >
        <img
          className='user-gallery-thumbnail__image'
          src={props.screenshot.image_url ?? ''}
        />
      </div>
      <div className='user-gallery-thumbnail__caption'>
        {props.screenshot.title}
      </div>
    </div>
  );
}
