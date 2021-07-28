<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Transformers;

use App\Models\UserScreenshot;

class UserScreenshotTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'image_size',
        'image_url',
        'user',
    ];

    public function transform(UserScreenshot $screenshot)
    {
        return [
            'id' => $screenshot->id,
            'is_deleted' => $screenshot->deleted_at !== null,
            'created_at' => json_time($screenshot->created_at),
            'title' => $screenshot->getTitle(),
        ];
    }

    public function includeImageUrl(UserScreenshot $screenshot)
    {
        return $this->primitive($screenshot->fileUrl());
    }

    public function includeUser(UserScreenshot $screenshot)
    {
        return $this->item($screenshot->user, new UserCompactTransformer());
    }
}
