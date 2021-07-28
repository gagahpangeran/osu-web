// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import ScreenshotJson from 'interfaces/screenshot-json';
import UserGalleryJson from 'interfaces/user-gallery-json';
import UserJsonExtended from 'interfaces/user-json-extended';
import * as React from 'react';

interface Props {
  gallery: UserGalleryJson;
  user: UserJsonExtended;
}

export default class Gallery extends React.PureComponent<Props> {
  render() {
    console.log(this.props.gallery.screenshots);

    if (this.props.gallery.screenshots.length === 0) {
      return (
        <div className='user-gallery user-gallery--empty'>
          No uploaded screenshot yet!
        </div>
      );
    }

    return (
      <div className='user-gallery'>
        {this.props.gallery.screenshots.map(this.renderThumbnail)}
      </div>
    );
  }

  private renderThumbnail = (screenshot: ScreenshotJson, index: number) => (
    <div key={screenshot.id} className='user-gallery__thumbnail'>
      <div
        className='user-gallery__image-container js-gallery'
        data-gallery-id={`user-gallery-${this.props.user.id}`}
        data-height='1080'
        data-index={`${index}`}
        data-src={screenshot.image_url}
        data-width='1920'
      >
        <img
          className='user-gallery__image'
          src={screenshot.image_url ?? ''}
        />
      </div>
      <div className='user-gallery__caption'>
        {screenshot.title}
      </div>
    </div>
  );
}
