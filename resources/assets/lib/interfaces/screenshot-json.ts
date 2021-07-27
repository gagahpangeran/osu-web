// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

import UserJson from './user-json';

export default interface ScreenshotJson {
  created_at: string;
  id: number;
  is_deleted: boolean;
  image_url: string | null;
  title: string;
  user: UserJson;
}
