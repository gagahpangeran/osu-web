<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'header' => [
        'small' => 'Soutěž i jinak, než jen klikáním na kruhy.',
        'large' => 'Komunitní soutěže',
    ],

    'index' => [
        'nav_title' => 'výpis',
    ],

    'judge' => [
        'comments' => 'komentáře',
        'hide_judged' => 'skrýt posuzované položky',
        'nav_title' => 'soudce',
        'no_current_vote' => 'ještě jsi nehlasoval.',
        'update' => 'aktualizovat',
        'validation' => [
            'missing_score' => 'chybějící skóre',
            'contest_vote_judged' => 'nelze volit v souzených soutěžích',
        ],
        'voted' => 'Již jsi pro tuto položku hlasoval.',
    ],

    'judge_results' => [
        '_' => 'Výsledky souzení',
        'creator' => 'autor',
        'score' => 'Skóre',
        'score_std' => '',
        'total_score' => 'celkové skóre',
        'total_score_std' => '',
    ],

    'voting' => [
        'judge_link' => 'Jsi soudcem této soutěže. Podívej se zde na příspěvky!',
        'judged_notice' => 'Tato soutěž využívá systém souzení, soudci v současné době zpracovávají příspěvky.',
        'login_required' => 'Pro hlasování se prosím přihlas.',
        'over' => 'Hlasování pro tuto soutěž bylo ukončeno',
        'show_voted_only' => 'Zobrazit odhlasované',

        'best_of' => [
            'none_played' => "Vypadá to, že nemáš odehrané žádné beatmapy, které jsou kvalifikované na tuto soutěž!",
        ],

        'button' => [
            'add' => 'Hlasovat',
            'remove' => 'Odebrat hlas',
            'used_up' => 'Využil jsi všechny svoje hlasy',
        ],

        'progress' => [
            '_' => 'Použito :used / :max hlasů',
        ],

        'requirement' => [
            'playlist_beatmapsets' => [
                'incomplete_play' => 'Musíte nejdříve zahrát všechny beatmapy v daném playlistu než budete moci hlasovat',
            ],
        ],
    ],

    'entry' => [
        '_' => 'vstup',
        'login_required' => 'Pro vstup do soutěže se prosím přihlas.',
        'silenced_or_restricted' => 'Nemůžeš se účastnit soutěží, zatímco je tvůj účet omezený nebo ztlumený.',
        'preparation' => 'Tuto soutěž právě připravujeme. Prosím čekej trpělivě!',
        'drop_here' => 'Tvůj vstup přetáhni sem',
        'download' => 'Stáhnout .osz',

        'wrong_type' => [
            'art' => 'Pouze .jpg a .png soubory jsou přijímány pro tuto soutěž.',
            'beatmap' => 'Pouze .osu soubory jsou přijímány pro tuto soutěž.',
            'music' => 'Pouze .mp3 soubory jsou přijímány pro tuto soutěž.',
        ],

        'wrong_dimensions' => 'Příspěvky do soutěže musí mít rozměry :widthx:height',
        'too_big' => 'Možné vstupy pro tuto soutěž jsou :limit-krát.',
    ],

    'beatmaps' => [
        'download' => 'Stáhnout vstup',
    ],

    'vote' => [
        'list' => 'hlasy',
        'count' => ':count_delimited hlas|:count_delimited hlasy|:count_delimited hlasů',
        'points' => ':count_delimited bod|:count_delimited body|:count_delimited bodů',
        'points_float' => '',
    ],

    'dates' => [
        'ended' => 'Ukončeno :date',
        'ended_no_date' => 'Ukončeno',

        'starts' => [
            '_' => 'Začíná :date',
            'soon' => 'brzy™',
        ],
    ],

    'states' => [
        'entry' => 'Vstup otevřen',
        'voting' => 'Hlasování začalo',
        'results' => 'Výsledky vyhlášeny',
    ],
];
