<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Transformers\Multiplayer;

use App\Models\Multiplayer\PlaylistItem;
use App\Transformers\BeatmapCompactTransformer;
use App\Transformers\ScoreTransformer;
use App\Transformers\TransformerAbstract;

class PlaylistItemTransformer extends TransformerAbstract
{
    protected array $availableIncludes = [
        'beatmap',
        'details',
        'scores',
    ];

    public function transform(PlaylistItem $item)
    {
        return [
            'id' => $item->id,
            'room_id' => $item->room_id,
            'beatmap_id' => $item->beatmap_id,
            'created_at' => json_time($item->created_at),
            'ruleset_id' => $item->ruleset_id,
            'allowed_mods' => $item->allowed_mods,
            'required_mods' => $item->required_mods,
            'freestyle' => $item->freestyle,
            'expired' => $item->expired,
            'owner_id' => $item->owner_id,
            'playlist_order' => $item->playlist_order,
            'played_at' => json_time($item->played_at),
        ];
    }

    public function includeBeatmap(PlaylistItem $item)
    {
        return $this->item(
            $item->beatmap,
            new BeatmapCompactTransformer()
        );
    }

    public function includeDetails(PlaylistItem $item)
    {
        return $this->primitive($item->detailEvent->event_detail ?? [
            'room_type' => $item->room->type,
        ]);
    }

    public function includeScores(PlaylistItem $item)
    {
        return $this->collection(
            $item->scoreLinks,
            new ScoreTransformer(false)
        );
    }
}
