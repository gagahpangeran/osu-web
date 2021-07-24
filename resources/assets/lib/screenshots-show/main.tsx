// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import HeaderV4 from 'header-v4';
import ScreenshotJson from 'interfaces/screenshot-json';
import * as React from 'react';

interface Props {
  screenshot: ScreenshotJson;
}

export default function Main(props: Props) {
  return (
    <>
      <HeaderV4 />
    </>
  );
}
