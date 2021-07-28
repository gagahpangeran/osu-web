<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Http\Controllers\Users;

use App\Http\Controllers\API\Controller;
use App\Libraries\User\FindForProfilePage;
use App\Models\UserScreenshot;
use App\Transformers\UserTransformer;

class GalleryController extends Controller
{
    public function index()
    {
        $request = request();
        $user = FindForProfilePage::find($request->route('user'));
        $params = $request->all();
        $limit = clamp(get_int($params['limit'] ?? null) ?? 10, 1, 10);

        $search = UserScreenshot::search([
            'cursor' => $params['cursor'] ?? null,
            'limit' => $limit,
            'user' => $user,
        ]);

        [$screenshots, $hasMore] = $search['query']->with(['user'])->getWithHasMore();

        $jsonUser = json_item(
            $user,
            (new UserTransformer())->setMode($user->playmode),
            UserTransformer::PROFILE_HEADER_INCLUDES,
        );

        $json = [
            'screenshots' => json_collection($screenshots, 'UserScreenshot', ['image_url']),
            'cursor' => $hasMore ? $search['cursorHelper']->next($screenshots) : null,
            'search' => $search['search'],
        ];

        if (is_json_request()) {
            return $json;
        }

        return ext_view('users.gallery.index', compact('json', 'jsonUser', 'user'));
    }
}
