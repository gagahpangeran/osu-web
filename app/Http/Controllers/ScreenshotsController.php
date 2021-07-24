<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Http\Controllers;

use App\Models\UserScreenshot;
use Auth;
use Request;

class ScreenshotsController extends Controller
{
    const ALLOWED_EXTENSIONS = [
        'jpg',
        'jpeg',
        'png',
    ];

    public function __construct()
    {
        $this->middleware('auth');

        return parent::__construct();
    }

    public function store()
    {
        if (Request::hasFile('screenshot') !== true) {
            abort(422);
        }

        $user = Auth::user();

        priv_check('ScreenshotStore')->ensureCan();

        if (!in_array(strtolower(Request::file('screenshot')->getClientOriginalExtension()), static::ALLOWED_EXTENSIONS, true)) {
            abort(422);
        }

        $screenshot = UserScreenshot::upload(
            Request::file('screenshot'),
            $user,
        );

        return json_item($screenshot, 'UserScreenshot');
    }
}
