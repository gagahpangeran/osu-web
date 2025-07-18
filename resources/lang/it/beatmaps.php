<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'invalid_ruleset' => 'Modalità specificata non valida.',

    'change_owner' => [
        'too_many' => 'Troppi mapper guest.',
    ],

    'discussion-votes' => [
        'update' => [
            'error' => 'Errore durante l\'aggiornamento del voto',
        ],
    ],

    'discussions' => [
        'allow_kudosu' => 'permetti kudosu',
        'beatmap_information' => 'Pagina della Beatmap',
        'delete' => 'elimina',
        'deleted' => 'Eliminato da :editor :delete_time.',
        'deny_kudosu' => 'nega kudosu',
        'edit' => 'modifica',
        'edited' => 'Ultima modifica di :editor :update_time',
        'guest' => 'Difficoltà guest di :user',
        'kudosu_denied' => 'Negato dall\'ottenimento di kudosu.',
        'message_placeholder_deleted_beatmap' => 'Questa difficoltà è stata eliminata, quindi non può più essere discussa.',
        'message_placeholder_locked' => 'La discussione per questa beatmap è stata disabilitata.',
        'message_placeholder_silenced' => "Non puoi postare una discussione mentre sei silenziato.",
        'message_type_select' => 'Seleziona il tipo di commento',
        'reply_notice' => 'Premi invio per rispondere.',
        'reply_resolve_notice' => 'Premi Invio per rispondere. Premi ctrl+invio per rispondere e risolvere.',
        'reply_placeholder' => 'Scrivi la tua risposta qui',
        'require-login' => 'Effettua il login per poter postare o rispondere',
        'resolved' => 'Risolto',
        'restore' => 'ripristina',
        'show_deleted' => 'Mostra eliminati',
        'title' => 'Discussioni',
        'unresolved_count' => ':count_delimited problema irrisolto|:count_delimited problemi irrisolti',

        'collapse' => [
            'all-collapse' => 'Comprimi tutto',
            'all-expand' => 'Espandi tutto',
        ],

        'empty' => [
            'empty' => 'Ancora nessuna discussione!',
            'hidden' => 'Nessuna discussione coincide con il filtro selezionato.',
        ],

        'lock' => [
            'button' => [
                'lock' => 'Blocca discussione',
                'unlock' => 'Sblocca discussione',
            ],

            'prompt' => [
                'lock' => 'Motivo del blocco',
                'unlock' => 'Sei sicuro di voler sbloccare?',
            ],
        ],

        'message_hint' => [
            'in_general' => 'Questo post andrà nella discussione generale della beatmap. Per moddare questa beatmap, inizia il tuo messaggio con un timestamp (es. 00:12:345).',
            'in_timeline' => 'Per moddare più timestamp, crea un post per ogni timestamp.',
        ],

        'message_placeholder' => [
            'general' => 'Scrivi qui per postare in Generale (:version)',
            'generalAll' => 'Scrivi qui per postare in Generale (Tutte le difficoltà)',
            'review' => 'Scrivi qui per postare una revisione',
            'timeline' => 'Scrivi qui per postare su Cronologia (:version)',
        ],

        'message_type' => [
            'disqualify' => 'Squalifica',
            'hype' => 'Hype!',
            'mapper_note' => 'Nota',
            'nomination_reset' => 'Resetta Nomina',
            'praise' => 'Elogio',
            'problem' => 'Problema',
            'problem_warning' => 'Segnala un Problema',
            'review' => 'Revisione',
            'suggestion' => 'Suggerimento',
        ],

        'message_type_title' => [
            'disqualify' => 'Posta Squalifica',
            'hype' => 'Posta Hype!',
            'mapper_note' => 'Posta Nota',
            'nomination_reset' => 'Rimuovi tutte le Nomine',
            'praise' => 'Posta Elogio',
            'problem' => 'Posta Problema',
            'problem_warning' => 'Posta Problema',
            'review' => 'Posta Revisione',
            'suggestion' => 'Posta Suggerimento',
        ],

        'mode' => [
            'events' => 'Cronologia',
            'general' => 'Generale :scope',
            'reviews' => 'Revisioni',
            'timeline' => 'Cronologia',
            'scopes' => [
                'general' => 'Questa difficoltà',
                'generalAll' => 'Tutte le difficoltà',
            ],
        ],

        'new' => [
            'pin' => 'Fissa',
            'timestamp' => 'Timestamp',
            'timestamp_missing' => 'fai ctrl-c nell\'editor e incolla nel tuo messaggio per aggiungere un timestamp!',
            'title' => 'Nuova Discussione',
            'unpin' => 'Non fissare',
        ],

        'review' => [
            'new' => 'Nuova revisione',
            'embed' => [
                'delete' => 'Elimina',
                'missing' => '[DISCUSSIONE ELIMINATA]',
                'unlink' => 'Dissocia',
                'unsaved' => 'Non salvato',
                'timestamp' => [
                    'all-diff' => 'I post su "Tutte le difficoltà" non possono avere un timestamp.',
                    'diff' => 'Se questo post inizia con un timestamp, verrà mostrato sotto Cronologia.',
                ],
            ],
            'insert-block' => [
                'paragraph' => 'inserisci paragrafo',
                'praise' => 'inserisci elogio',
                'problem' => 'inserisci problema',
                'suggestion' => 'inserisci suggerimento',
            ],
        ],

        'show' => [
            'title' => ':title mappata da :mapper',
        ],

        'sort' => [
            'created_at' => 'Data creazione',
            'timeline' => 'Cronologia',
            'updated_at' => 'Ultimo aggiornamento',
        ],

        'stats' => [
            'deleted' => 'Eliminato',
            'mapper_notes' => 'Note',
            'mine' => 'Miei',
            'pending' => 'In Attesa',
            'praises' => 'Elogi',
            'resolved' => 'Risolti',
            'total' => 'Tutti',
        ],

        'status-messages' => [
            'approved' => 'Questa beatmap è stata approvata il :date!',
            'graveyard' => "Questa beatmap non è stata aggiornata dal :date ed è stata molto probabilmente abbandonata...",
            'loved' => 'Questa beatmap è stata aggiunta a quelle amate il :date!',
            'ranked' => 'Questa beatmap è stata classificata il giorno :date!',
            'wip' => 'Nota: Questa beatmap è contrassegnata come work-in-progress dal creatore.',
        ],

        'votes' => [
            'none' => [
                'down' => 'Ancora nessun voto negativo',
                'up' => 'Ancora nessun voto positivo',
            ],
            'latest' => [
                'down' => 'Ultimi voti negativi',
                'up' => 'Ultimi voti positivi',
            ],
        ],
    ],

    'hype' => [
        'button' => 'Metti hype!',
        'button_done' => 'Hype già messo!',
        'confirm' => "Sei sicuro? Questo utilizzerà uno dei tuoi :n hype rimanenti e non può essere annullato.",
        'explanation' => 'Metti hype a questa beatmap per renderla più visibile per la nomina e il ranking!',
        'explanation_guest' => 'Effettua l\'accesso e metti hype a questa beatmap per renderla più visibile per la nomina e la classificazione!',
        'new_time' => "Riceverai un altro hype :new_time.",
        'remaining' => 'Hai ancora :remaining hype rimanenti.',
        'required_text' => 'Hype: :current/:required',
        'section_title' => 'Vagoni di hype',
        'title' => 'Hype',
    ],

    'feedback' => [
        'button' => 'Lascia un Feedback',
    ],

    'nominations' => [
        'already_nominated' => 'Hai già nominato questa beatmap.',
        'cannot_nominate' => 'Non puoi nominare questa modalità di gioco della beatmap.',
        'delete' => 'Elimina',
        'delete_own_confirm' => 'Sei sicuro? La beatmap verrà eliminata e sarai reindirizzato al tuo profilo.',
        'delete_other_confirm' => 'Sei sicuro? La beatmap verrà eliminata e sarai reindirizzato al profilo del creatore.',
        'disqualification_prompt' => 'Ragioni della squalifica?',
        'disqualified_at' => 'Squalificata :time_ago (:reason).',
        'disqualified_no_reason' => 'nessuna motivazione specificata',
        'disqualify' => 'Squalifica',
        'incorrect_state' => 'Errore nel eseguire quell\'azione, prova a ricaricare la pagina.',
        'love' => 'Ama',
        'love_choose' => 'Scegli la difficoltà da rendere amata',
        'love_confirm' => 'Ama questa beatmap?',
        'nominate' => 'Nomina',
        'nominate_confirm' => 'Nominare questa beatmap?',
        'nominated_by' => 'nominata da :users',
        'not_enough_hype' => "Non c'è abbastanza hype.",
        'remove_from_loved' => 'Rimuovi dalle amate',
        'remove_from_loved_prompt' => 'Motivo per la rimozione dalle amate:',
        'required_text' => 'Nomine: :current/:required',
        'reset_message_deleted' => 'eliminato',
        'title' => 'Stato nomine',
        'unresolved_issues' => 'Ci sono ancora dei problemi irrisolti che vanno prima sistemati.',

        'rank_estimate' => [
            '_' => 'È stimato che questa mappa verrà classificata in data :date se non vengono trovati problemi. È in posizione #:position nella :queue.',
            'unresolved_problems' => 'Questa mappa è attualmente bloccata dal lasciare la sezione Qualificata fino alla risoluzione di :problems.',
            'problems' => 'questi problemi',
            'on' => 'il giorno :date',
            'queue' => 'coda per la classifica',
            'soon' => 'molto vicina',
        ],

        'reset_at' => [
            'nomination_reset' => 'Processo di nomina azzerato :time_ago da :user con il nuovo problema :discussion (:message).',
            'disqualify' => 'Squalificato :time_ago da :user con il nuovo problema :discussion (:message).',
        ],

        'reset_confirm' => [
            'disqualify' => 'Sei sicuro? Questo rimuoverà la beatmap dalla qualificazione e resetterà il processo di nomina.',
            'nomination_reset' => 'Sei sicuro? Postando un nuovo problema si resetterà il processo di nomina.',
            'problem_warning' => 'Sei sicuro di voler segnalare un problema su questa beatmap? Questo avviserà i nominatori Beatmap.',
        ],
    ],

    'listing' => [
        'search' => [
            'prompt' => 'scrivi le parole chiave...',
            'login_required' => 'Accedi per effettuare una ricerca.',
            'options' => 'Più opzioni di ricerca',
            'supporter_filter' => 'Filtrare per :filters necessita di un tag osu!supporter attivo',
            'not-found' => 'nessun risultato',
            'not-found-quote' => '... trovato nulla.',
            'filters' => [
                'extra' => 'Extra',
                'general' => 'Generale',
                'genre' => 'Genere',
                'language' => 'Lingua',
                'mode' => 'Modalità',
                'nsfw' => 'Contenuto Esplicito',
                'played' => 'Giocato',
                'rank' => 'Grado Raggiunto',
                'status' => 'Categorie',
            ],
            'sorting' => [
                'title' => 'Titolo',
                'artist' => 'Artista',
                'difficulty' => 'Difficoltà',
                'favourites' => 'Preferiti',
                'updated' => 'Aggiornato',
                'ranked' => 'Classificata',
                'rating' => 'Valutazione',
                'plays' => 'Giocate',
                'relevance' => 'Pertinenza',
                'nominations' => 'Nomine',
            ],
            'supporter_filter_quote' => [
                '_' => 'Filtrare tramite :filters necessita di un :link attivo',
                'link_text' => 'tag osu!supporter',
            ],
        ],
    ],
    'general' => [
        'converts' => 'Includi beatmap convertite',
        'featured_artists' => 'Artisti in primo piano',
        'follows' => 'Mapper iscritti',
        'recommended' => 'Difficoltà consigliata',
        'spotlights' => 'Beatmap spotlight',
    ],
    'mode' => [
        'all' => 'Qualsiasi',
        'any' => 'Qualsiasi',
        'osu' => '',
        'taiko' => '',
        'fruits' => '',
        'mania' => '',
        'undefined' => 'non impostata',
    ],
    'status' => [
        'any' => 'Qualsiasi',
        'approved' => 'Approvate',
        'favourites' => 'Preferite',
        'graveyard' => 'Abbandonate',
        'leaderboard' => 'Con classifica',
        'loved' => 'Amate',
        'mine' => 'Le mie mappe',
        'pending' => 'In Attesa',
        'wip' => 'WIP',
        'qualified' => 'Qualificate',
        'ranked' => 'Classificate',
    ],
    'genre' => [
        'any' => 'Qualsiasi',
        'unspecified' => 'Non specificato',
        'video-game' => 'Videogiochi',
        'anime' => 'Anime',
        'rock' => 'Rock',
        'pop' => 'Pop',
        'other' => 'Altro',
        'novelty' => 'Novità',
        'hip-hop' => 'Hip Hop',
        'electronic' => 'Elettronica',
        'metal' => 'Metal',
        'classical' => 'Classico',
        'folk' => 'Folk',
        'jazz' => 'Jazz',
    ],
    'language' => [
        'any' => 'Qualsiasi',
        'english' => 'Inglese',
        'chinese' => 'Cinese',
        'french' => 'Francese',
        'german' => 'Tedesco',
        'italian' => 'Italiano',
        'japanese' => 'Giapponese',
        'korean' => 'Coreano',
        'spanish' => 'Spagnolo',
        'swedish' => 'Svedese',
        'russian' => 'Russo',
        'polish' => 'Polacco',
        'instrumental' => 'Strumentale',
        'other' => 'Altro',
        'unspecified' => 'Non specificato',
    ],

    'nsfw' => [
        'exclude' => 'Nascondi',
        'include' => 'Mostra',
    ],

    'played' => [
        'any' => 'Qualsiasi',
        'played' => 'Giocate',
        'unplayed' => 'Non giocate',
    ],
    'extra' => [
        'video' => 'Contiene video',
        'storyboard' => 'Contiene storyboard',
    ],
    'rank' => [
        'any' => 'Qualsiasi',
        'XH' => 'SS Argentata',
        'X' => '',
        'SH' => 'S Argentata',
        'S' => '',
        'A' => '',
        'B' => '',
        'C' => '',
        'D' => '',
    ],
    'panel' => [
        'playcount' => 'Volte giocata: :count',
        'favourites' => 'Preferiti: :count',
    ],
    'variant' => [
        'mania' => [
            '4k' => '4K',
            '7k' => '7K',
            'all' => 'Tutte',
        ],
    ],
];
