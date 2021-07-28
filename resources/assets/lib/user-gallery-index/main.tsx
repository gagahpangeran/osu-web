// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import UserGalleryJson from 'interfaces/user-gallery-json';
import UserJsonExtended from 'interfaces/user-json-extended';
import * as React from 'react';
import Header from 'user-gallery-index/header';
import UserProfileContainer from 'user-profile-container';
import Gallery from './gallery';

interface Props {
  gallery: UserGalleryJson;
  user: UserJsonExtended;
}

export default function Main(props: Props) {
  return (
    <UserProfileContainer user={props.user}>
      <Header user={props.user} />
      <div className='user-profile-pages'>
        <div className='user-profile-pages__item'>
          <div className='page-extra'>
            <h2 className='title title--page-extra'>{osu.trans('users.show.extra.gallery.title')}</h2>
            <Gallery gallery={props.gallery} user={props.user} />
          </div>
        </div>
      </div>
    </UserProfileContainer>
  );
}
