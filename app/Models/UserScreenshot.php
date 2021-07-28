<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Models;

use App\Traits\Uploadable;
use App\Traits\WithDbCursorHelper;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;

/**
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property int $id
 * @property string $image_url
 * @property string|null $title
 * @property \Carbon\Carbon|null $updated_at
 * @property User $user
 * @property int $user_id
 */
class UserScreenshot extends Model
{
    use SoftDeletes, Uploadable, WithDbCursorHelper;

    const SORTS = [
        'created' => [
            ['column' => 'id', 'order' => 'DESC', 'type' => 'int'],
        ]
    ];

    const DEFAULT_SORT = 'created';

    protected $table = 'osu_user_screenshots';

    public function getFileRoot()
    {
        return 'user-screenshots';
    }

    public function getTitle()
    {
        if ($this->deleted_at !== null) {
            return osu_trans('screenshots.show.deleted');
        }

        return $this->title ?? osu_trans('screenshots.show.no_title');
    }

    public static function search($params)
    {
        $query = static::query();

        $user = $params['user'];
        $sort = $params['sort'] ?? null;

        $query->uploadedBy($user);

        $cursorHelper = static::makeDbCursorHelper($sort);
        $query->cursorSort($cursorHelper, get_arr($sort));

        $limit = clamp(get_int($params['limit'] ?? 10), 1, 10);
        $query->limit($limit);

        return [
            'cursorHelper' => $cursorHelper,
            'query' => $query,
            'search' => ['limit' => $limit, 'sort' => $cursorHelper->getSortName()],
        ];
    }

    public function scopeUploadedBy($query, User $user)
    {
        return $query->where('user_id', $user->user_id);
    }

    public static function upload(UploadedFile $file, User $user): UserScreenshot
    {
        $screenshot = new static();

        DB::transaction(function () use ($screenshot, $file, $user) {
            $screenshot->save(); // get id
            $screenshot->user()->associate($user);
            $screenshot->storeFile($file->getRealPath(), $file->extension());
            $screenshot->save();
        });

        return $screenshot;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
