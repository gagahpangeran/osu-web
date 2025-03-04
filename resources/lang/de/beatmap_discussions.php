<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'authorizations' => [
        'update' => [
            'null_user' => 'Zum Bearbeiten bitte einloggen.',
            'system_generated' => 'Automatisch erzeugte Beiträge können nicht bearbeitet werden.',
            'wrong_user' => 'Nur der Autor des Beitrages kann den Beitrag bearbeiten.',
        ],
    ],

    'events' => [
        'empty' => 'Noch ist nichts passiert.',
    ],

    'index' => [
        'deleted_beatmap' => 'gelöscht',
        'none_found' => 'Es wurden keine Diskussionen gefunden, die mit diesen Suchkriterien übereinstimmen.',
        'title' => 'Beatmapdiskussion',

        'form' => [
            '_' => 'Suche',
            'deleted' => 'Gelöschte Diskussionen einbeziehen',
            'mode' => 'Beatmap-Modus',
            'only_unresolved' => 'Nur ungelöste Diskussionen anzeigen',
            'show_review_embeds' => 'Bewertungsbeiträge anzeigen',
            'types' => 'Nachrichtentyp',
            'username' => 'Benutzername',

            'beatmapset_status' => [
                '_' => 'Beatmap-Status',
                'all' => 'Alle',
                'disqualified' => 'Disqualifiziert',
                'never_qualified' => 'Nie Qualifiziert',
                'qualified' => 'Qualifiziert',
                'ranked' => 'Ranked',
            ],

            'user' => [
                'label' => 'Benutzer',
                'overview' => 'Aktivitätsübersicht',
            ],
        ],
    ],

    'item' => [
        'created_at' => 'Beitragsdatum',
        'deleted_at' => 'Löschdatum',
        'message_type' => 'Typ',
        'permalink' => 'Permalink',
    ],

    'nearby_posts' => [
        'confirm' => 'Keiner dieser Beiträge behandelt mein Anliegen.',
        'notice' => 'Es gibt bereits Beiträge in der Nähe von :timestamp (:existing_timestamps). Bitte überprüfe sie, bevor du diesen absendest.',
        'unsaved' => ':count in dieser Bewertung',
    ],

    'owner_editor' => [
        'button' => 'Difficulty-Besitzer',
        'reset_confirm' => 'Besitzer für diese Difficulty zurücksetzen?',
        'user' => 'Besitzer',
        'version' => 'Difficulty',
    ],

    'refresh' => [
        'checking' => 'Prüfe auf Updates...',
        'has_updates' => 'Klicke, um die Aktualisierungen der Diskussion zu laden.',
        'no_updates' => 'Keine Updates.',
        'updating' => 'Aktualisiere...',
    ],

    'reply' => [
        'open' => [
            'guest' => 'Zum Antworten einloggen',
            'user' => 'Antworten',
        ],
    ],

    'review' => [
        'block_count' => ':used / :max Blöcke verwendet',
        'go_to_parent' => 'Kurzfassungs-Beitrag anzeigen',
        'go_to_child' => 'Diskussion anzeigen',
        'validation' => [
            'block_too_large' => 'jeder Block darf höchstens :limit Zeichen enthalten',
            'external_references' => 'Kurzfassung enthält Verweise auf Probleme, die nicht zu dieser Kurzfassung gehören',
            'invalid_block_type' => 'ungültiger Block-Typ',
            'invalid_document' => 'ungültige Kurzfassung',
            'invalid_discussion_type' => 'ungültiger Diskussionstyp',
            'minimum_issues' => 'Kurzfassung muss ein Minimum von :count Problem beinhalten|Kurzfassungen müssen ein Minimum von :count Problemen beinhalten',
            'missing_text' => 'Block fehlt Text',
            'too_many_blocks' => 'Kurzfassungen dürfen nur :count Paragraph/Problem enthalten|Kurzfassungen dürfen nur bis zu :count Paragraphen/Probleme enthalten',
        ],
    ],

    'system' => [
        'resolved' => [
            'true' => 'Von :user als gelöst erklärt',
            'false' => 'Von :user wiedereröffnet',
        ],
    ],

    'timestamp_display' => [
        'general' => 'Allgemein',
        'general_all' => 'Allgemein (alle)',
    ],

    'user_filter' => [
        'everyone' => 'Jeder',
        'label' => 'Nach Benutzer filtern',
    ],
];
