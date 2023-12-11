<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Models\Contest;
use Auth;

class ContestsController extends Controller
{
    public function index()
    {
        $contests = Contest::orderBy('id', 'desc');

        if (!Auth::check() || !Auth::user()->isAdmin()) {
            $contests->where('visible', true);
        }

        return ext_view('contests.index', [
            'contests' => $contests->get(),
        ]);
    }

    public function judge($id)
    {
        $contest = Contest::with('entries')
            ->with('entries.judgeVotes')
            ->with('entries.judgeVotes.scores')
            ->with('judgeCategories')
            ->findOrFail($id);

        abort_if(!$contest->isJudged(), 404);

        priv_check('ContestJudge', $contest)->ensureCan();

        $contestJson = json_item($contest, 'Contest', ['judge_categories']);
        $entriesJson = json_collection($contest->entries, 'ContestEntry', [
            'current_user_judge_vote.scores',
        ]);

        return ext_view('contests.judge', [
            'contestJson' => $contestJson,
            'entriesJson' => $entriesJson,
        ]);
    }

    public function show($id)
    {
        $contest = Contest::with('judges')
            ->findOrFail($id);

        $user = Auth::user();
        if (!$contest->visible && (!$user || !$user->isAdmin())) {
            abort(404);
        }

        $isJudge = $user !== null && $contest->judges->find($user->getKey()) !== null;

        if ($contest->isVotingStarted() && isset($contest->getExtraOptions()['children'])) {
            $contestIds = $contest->getExtraOptions()['children'];
            $contests = Contest::whereIn('id', $contestIds)
                ->orderByField('id', $contestIds)
                ->get();
        } else {
            $contests = collect([$contest]);
        }

        set_opengraph($contest);

        if ($contest->isVotingStarted()) {
            if ($contest->isVotingOpen()) {
                // TODO: add support for $contests requirement instead of at parent
                try {
                    $contest->assertVoteRequirement($user);
                } catch (InvariantException $e) {
                    $noVoteReason = $e->getMessage();
                }
            }

            return ext_view('contests.voting', [
                'contestMeta' => $contest,
                'contests' => $contests,
                'isJudge' => $isJudge,
                'noVoteReason' => $noVoteReason ?? null,
            ]);
        } else {
            return ext_view('contests.enter', [
                'contestMeta' => $contest,
                'contest' => $contests->first(),
            ]);
        }
    }
}
