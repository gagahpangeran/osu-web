<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Models\Traits;

use App\Libraries\Score\FetchDedupedScores;
use App\Libraries\Search\ScoreSearchParams;
use App\Models\Beatmap;
use App\Models\Solo\Score;
use Illuminate\Database\Eloquent\Collection;

trait UserScoreable
{
    private array $beatmapBestScoreIds = [];
    private array $beatmapBestScores = [];

    public function aggregatedScoresBest(string $mode, int $size): array
    {
        return (new FetchDedupedScores('beatmap_id', ScoreSearchParams::fromArray([
            'exclude_without_pp' => true,
            'limit' => $size,
            'ruleset_id' => Beatmap::MODES[$mode],
            'sort' => 'pp_desc',
            'user_id' => $this->getKey(),
        ]), "aggregatedScoresBest_{$mode}"))->all();
    }

    public function beatmapBestScoreIds(string $mode)
    {
        if (!isset($this->beatmapBestScoreIds[$mode])) {
            // aggregations do not support regular pagination.
            // always fetching 200 to cache; we're not supporting beyond 200, either.
            $this->beatmapBestScoreIds[$mode] = cache_remember_mutexed(
                "search-cache:beatmapBestScoresSolo-v2:{$this->getKey()}:{$mode}",
                $GLOBALS['cfg']['osu']['scores']['es_cache_duration'],
                [],
                function () use ($mode) {
                    $this->beatmapBestScores[$mode] = $this->aggregatedScoresBest($mode, 200);

                    return array_column($this->beatmapBestScores[$mode], 'id');
                },
                function () {
                    // TODO: propagate a more useful message back to the client
                    // for now we just mark the exception as handled.
                    return true;
                }
            );
        }

        return $this->beatmapBestScoreIds[$mode];
    }

    public function beatmapBestScores(string $mode, int $limit, int $offset, array $with): Collection
    {
        $ids = $this->beatmapBestScoreIds($mode);

        if (isset($this->beatmapBestScores[$mode])) {
            $results = new Collection(array_slice($this->beatmapBestScores[$mode], $offset, $limit));
        } else {
            $ids = array_slice($ids, $offset, $limit);
            $results = Score::whereKey($ids)->orderByField('id', $ids)->default()->get();
        }

        $results->load($with);
        // make outdated index less obvious
        $results = $results->sortByDesc('pp');

        // fill in positions for weighting
        // also preload the user relation
        $position = $offset;
        foreach ($results as $result) {
            $result->weight = pow(0.95, $position);
            $result->setRelation('user', $this);
            $position++;
        }

        return $results;
    }
}
