// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import UserGalleryJson from 'interfaces/user-gallery-json';
import UserJsonExtended from 'interfaces/user-json-extended';
import core from 'osu-core-singleton';
import * as React from 'react';
import Main from 'user-gallery-index/main';

core.reactTurbolinks.register('user-gallery-index', () => {
  const jsonUser = osu.parseJson<UserJsonExtended>('json-user');
  const json = osu.parseJson<UserGalleryJson>('json-user-gallery-index');

  return (
    <Main gallery={json} user={jsonUser} />
  );
});
