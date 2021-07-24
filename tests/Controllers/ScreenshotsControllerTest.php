<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace Tests\Controllers;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ScreenshotsControllerTest extends TestCase
{
    private User $user;

    public function testUploadScreenshot()
    {
        $this->actAsScopedUser($this->user, ['*']);
        $request = $this->json('POST', route('api.screenshots.store'), [
            'screenshot' => UploadedFile::fake()->image('screenshot.jpg'),
        ]);

        $request->assertStatus(200);
    }

    public function testUploadNonImage()
    {
        $this->actAsScopedUser($this->user, ['*']);
        $request = $this->json('POST', route('api.screenshots.store'), [
            'screenshot' => UploadedFile::fake()->image('document.pdf'),
        ]);

        $request->assertStatus(422);
    }

    public function testUploadWithoutImage()
    {
        $this->actAsScopedUser($this->user, ['*']);
        $request = $this->json('POST', route('api.screenshots.store'));

        $request->assertStatus(422);
    }

    public function testUploadWithoutLogin()
    {
        $request = $this->json('POST', route('api.screenshots.store'), [
            'screenshot' => UploadedFile::fake()->image('screenshot.jpg'),
        ]);

        $request->assertStatus(401);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }
}
