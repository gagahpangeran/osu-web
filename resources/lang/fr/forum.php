<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'pinned_topics' => 'Sujets épinglés',
    'slogan' => "it's dangerous to play alone.",
    'subforums' => 'Sous-forums',
    'title' => 'Forums',

    'covers' => [
        'edit' => 'Modifier la bannière',

        'create' => [
            '_' => 'Définir une image de bannière',
            'button' => 'Mettre en ligne une bannière ',
            'info' => 'La résolution de la bannière devrait être de :dimensions. Vous pouvez également faire glisser l\'image ici pour la mettre en ligne.',
        ],

        'destroy' => [
            '_' => 'Retirer la bannière',
            'confirm' => 'Êtes-vous sûr de vouloir supprimer la bannière ?',
        ],
    ],

    'forums' => [
        'forums' => 'Forums',
        'latest_post' => 'Dernier post',

        'index' => [
            'title' => 'Accueil du forum',
        ],

        'topics' => [
            'empty' => 'Pas de sujets !',
        ],
    ],

    'mark_as_read' => [
        'forum' => 'Marquer le forum comme lu',
        'forums' => 'Marquer les forums comme lus',
        'busy' => 'Veuillez patienter...',
    ],

    'post' => [
        'confirm_destroy' => 'Voulez-vous vraiment supprimer ce post ?',
        'confirm_restore' => 'Voulez-vous vraiment restaurer ce post ?',
        'edited' => 'Dernière modification par :user :when, modifié :count_delimited fois au total.|Dernière modification par :user :when, modifié :count_delimited fois au total.',
        'posted_at' => 'posté :when',
        'posted_by_in' => 'posté par :username dans :forum',

        'actions' => [
            'destroy' => 'Supprimer le post',
            'edit' => 'Modifier le post',
            'report' => 'Signaler le post',
            'restore' => 'Restaurer le post',
        ],

        'create' => [
            'title' => [
                'reply' => 'Nouvelle réponse',
            ],
        ],

        'info' => [
            'post_count' => ':count_delimited post|:count_delimited posts',
            'topic_starter' => 'Créateur du sujet',
        ],
    ],

    'search' => [
        'go_to_post' => 'Aller au post',
        'post_number_input' => 'entrer le numéro du post',
        'total_posts' => ':posts_count posts au total',
    ],

    'topic' => [
        'confirm_destroy' => 'Voulez-vous vraiment supprimer ce sujet ?',
        'confirm_restore' => 'Voulez-vous vraiment restaurer ce sujet ?',
        'deleted' => 'sujet supprimé',
        'go_to_latest' => 'voir le dernier post',
        'go_to_unread' => 'voir le premier message non lu',
        'has_replied' => 'Vous avez répondu à ce sujet',
        'in_forum' => 'dans :forum',
        'latest_post' => ':when par :user',
        'latest_reply_by' => 'dernière réponse par :user',
        'new_topic' => 'Poster un nouveau sujet',
        'new_topic_login' => 'Connectez-vous pour poster un nouveau sujet',
        'post_reply' => 'Poster',
        'reply_box_placeholder' => 'Tapez ici pour répondre',
        'reply_title_prefix' => 'Re',
        'started_by' => 'par :user',
        'started_by_verbose' => 'commencé par :user',

        'actions' => [
            'destroy' => 'Supprimer le sujet',
            'restore' => 'Restaurer le sujet',
        ],

        'create' => [
            'close' => 'Fermer',
            'preview' => 'Aperçu',
            // TL note: this is used in the topic reply preview, when
            // the user goes back from previewing to editing the reply
            'preview_hide' => 'Modifier',
            'submit' => 'Poster',

            'necropost' => [
                'default' => 'Ce sujet est inactif depuis un certain temps. Ne postez ici que si vous avez une raison spécifique de le faire.',

                'new_topic' => [
                    '_' => "Ce sujet est inactif depuis un certain temps. Si vous n'avez pas de raison spécifique de poster ici, merci de :create à la place.",
                    'create' => 'créer un nouveau sujet',
                ],
            ],

            'placeholder' => [
                'body' => 'Écrivez le contenu du post ici',
                'title' => 'Cliquez ici pour définir le titre du post',
            ],
        ],

        'jump' => [
            'enter' => 'cliquez pour entrer un numéro de post spécifique',
            'first' => 'aller au premier post',
            'last' => 'aller au dernier post',
            'next' => 'sauter les 10 prochains posts',
            'previous' => 'reculer de 10 posts',
        ],

        'logs' => [
            '_' => 'Historique du sujet',
            'button' => 'Parcourir l\'historique du sujet',

            'columns' => [
                'action' => 'Action',
                'date' => 'Date',
                'user' => 'Utilisateur',
            ],

            'data' => [
                'add_tag' => 'a ajouté le tag ":tag"',
                'announcement' => 'a épinglé le sujet et l’a marqué comme annonce',
                'edit_topic' => 'à :title',
                'fork' => 'de :topic',
                'pin' => 'sujet épinglé',
                'post_operation' => 'posté par :username',
                'remove_tag' => 'tag ":tag" supprimé',
                'source_forum_operation' => 'de :forum',
                'unpin' => 'sujet désépinglé',
            ],

            'no_results' => 'aucun historique trouvé...',

            'operations' => [
                'delete_post' => 'Post supprimé',
                'delete_topic' => 'Sujet supprimé',
                'edit_topic' => 'Titre du sujet modifié',
                'edit_poll' => 'Sondage du sujet modifié',
                'fork' => 'Sujet copié',
                'issue_tag' => 'Tag attribué',
                'lock' => 'Sujet verrouillé',
                'merge' => 'Posts fusionnés dans ce sujet',
                'move' => 'Sujet déplacé',
                'pin' => 'Sujet épinglé',
                'post_edited' => 'Post édité',
                'restore_post' => 'Post restauré',
                'restore_topic' => 'Sujet restauré',
                'split_destination' => 'Posts séparés déplacés',
                'split_source' => 'Posts séparés',
                'topic_type' => 'Type de sujet défini',
                'topic_type_changed' => 'Le type du sujet a été modifié',
                'unlock' => 'Sujet déverrouillé',
                'unpin' => 'Sujet désépinglé',
                'user_lock' => 'A verrouillé son propre sujet',
                'user_unlock' => 'A déverrouillé son propre sujet',
            ],
        ],

        'post_edit' => [
            'cancel' => 'Annuler',
            'post' => 'Sauvegarder',
        ],
    ],

    'topic_watches' => [
        'index' => [
            'title_compact' => 'liste d\'abonnements aux sujets du forum',

            'box' => [
                'total' => 'Sujets suivis',
                'unread' => 'Sujets avec nouvelles réponses',
            ],

            'info' => [
                'total' => 'Vous suivez un total de :total sujets.',
                'unread' => 'Vous avez :unread réponses non-lues sur vos sujets suivis.',
            ],
        ],

        'topic_buttons' => [
            'remove' => [
                'confirmation' => 'Se désabonner du sujet ?',
                'title' => 'Se désabonner',
            ],
        ],
    ],

    'topics' => [
        '_' => 'Sujets',

        'actions' => [
            'login_reply' => 'Connectez-vous pour répondre',
            'reply' => 'Répondre',
            'reply_with_quote' => 'Citer un post et répondre',
            'search' => 'Rechercher',
        ],

        'create' => [
            'create_poll' => 'Créer un sondage',

            'preview' => 'Aperçu du post',

            'create_poll_button' => [
                'add' => 'Créer un sondage',
                'remove' => 'Annuler la création du sondage',
            ],

            'poll' => [
                'hide_results' => 'Masquer les résultats du sondage.',
                'hide_results_info' => 'Ils ne seront affichés qu\'après la clôture du sondage.',
                'length' => 'Durée du sondage',
                'length_days_suffix' => 'jours',
                'length_info' => 'Laissez vide pour un sondage sans fin',
                'max_options' => 'Réponses par utilisateur',
                'max_options_info' => 'Il s\'agit du nombre d\'options que chaque utilisateur peut sélectionner lors du vote.',
                'options' => 'Options',
                'options_info' => 'Entrez chaque option sur une nouvelle ligne. Vous pouvez entrer jusqu\'à 10 options.',
                'title' => 'Question',
                'vote_change' => 'Autoriser le changement de vote.',
                'vote_change_info' => 'Si cette option est activée, les utilisateurs pourront changer leur vote.',
            ],
        ],

        'edit_title' => [
            'start' => 'Modifier le titre',
        ],

        'index' => [
            'feature_votes' => 'priorité en étoiles',
            'replies' => 'réponses',
            'views' => 'vues',
        ],

        'issue_tag_added' => [
            'to_0' => 'Supprimer le tag "added"',
            'to_0_done' => 'Tag "added" supprimé',
            'to_1' => 'Ajouter le tag "added"',
            'to_1_done' => 'Tag "added" ajouté',
        ],

        'issue_tag_assigned' => [
            'to_0' => 'Supprimer le tag "assigned"',
            'to_0_done' => 'Tag "assigned" supprimé',
            'to_1' => 'Ajouter le tag "assigned"',
            'to_1_done' => 'Tag "assigned" ajouté',
        ],

        'issue_tag_confirmed' => [
            'to_0' => 'Supprimer le tag "confirmed"',
            'to_0_done' => 'Tag "confirmed" supprimé',
            'to_1' => 'Ajouter le tag "confirmed"',
            'to_1_done' => 'Tag "confirmed" ajouté',
        ],

        'issue_tag_duplicate' => [
            'to_0' => 'Supprimer le tag "duplicate"',
            'to_0_done' => 'Tag "duplicate" supprimé',
            'to_1' => 'Ajouter le tag "duplicate"',
            'to_1_done' => 'Tag "duplicate" ajouté',
        ],

        'issue_tag_invalid' => [
            'to_0' => 'Supprimer le tag "invalid"',
            'to_0_done' => 'Tag "invalid" supprimé',
            'to_1' => 'Ajouter le tag "invalid"',
            'to_1_done' => 'Tag "invalid" ajouté',
        ],

        'issue_tag_resolved' => [
            'to_0' => 'Supprimer le tag "resolved"',
            'to_0_done' => 'Tag "resolved" supprimé',
            'to_1' => 'Ajouter le tag "resolved"',
            'to_1_done' => 'Tag "resolved" ajouté',
        ],

        'issue_tag_osulazer' => [
            'to_0' => 'Supprimer le tag « osu!lazer »',
            'to_0_done' => 'Tag « osu!lazer » supprimé',
            'to_1' => 'Ajouter le tag « osu!lazer »',
            'to_1_done' => 'Tag « osu!lazer » ajouté',
        ],

        'issue_tag_osustable' => [
            'to_0' => 'Supprimer le tag « osu!stable »',
            'to_0_done' => 'Tag « osu!stable » supprimé',
            'to_1' => 'Ajouter le tag « osu!stable »',
            'to_1_done' => 'Tag « osu!stable » ajouté',
        ],

        'issue_tag_osuweb' => [
            'to_0' => 'Supprimer le tag « osu!web »',
            'to_0_done' => 'Tag « osu!web » supprimé',
            'to_1' => 'Ajouter le tag « osu!web »',
            'to_1_done' => 'Tag « osu!web » ajouté',
        ],

        'lock' => [
            'is_locked' => 'Ce sujet est verrouillé, vous ne pouvez pas y répondre',
            'to_0' => 'Déverrouiller le sujet',
            'to_0_confirm' => 'Déverrouiller le sujet ?',
            'to_0_done' => 'Le sujet a été déverrouillé',
            'to_1' => 'Verrouiller le sujet',
            'to_1_confirm' => 'Verrouiller le sujet ?',
            'to_1_done' => 'Le sujet a été verrouillé',
        ],

        'moderate_move' => [
            'title' => 'Déplacer vers un autre forum',
        ],

        'moderate_pin' => [
            'to_0' => 'Désépingler le sujet',
            'to_0_confirm' => 'Désépingler le sujet ?',
            'to_0_done' => 'Le sujet a été désépinglé',
            'to_1' => 'Épingler le sujet',
            'to_1_confirm' => 'Épingler le sujet ?',
            'to_1_done' => 'Le sujet a été épinglé',
            'to_2' => 'Épingler le sujet et marquer en tant qu\'annonce',
            'to_2_confirm' => 'Épingler le sujet et le marquer en tant qu\'annonce ?',
            'to_2_done' => 'Le sujet a été épinglé et marqué en tant qu\'annonce',
        ],

        'moderate_toggle_deleted' => [
            'show' => 'Montrer les posts supprimés',
            'hide' => 'Masquer les posts supprimés',
        ],

        'show' => [
            'deleted-posts' => 'Posts supprimés',
            'total_posts' => 'Total des posts',

            'feature_vote' => [
                'current' => 'Priorité actuelle : +:count',
                'do' => 'Promouvoir cette demande',

                'info' => [
                    '_' => 'Il s\'agit d\'une :feature_request. Les demandes de fonctionnalité peuvent être votées par des :supporters.',
                    'feature_request' => 'demande de fonctionnalité',
                    'supporters' => 'supporters',
                ],

                'user' => [
                    'count' => '{0} pas de votes|{1} :count_delimited vote|[2,*] :count_delimited votes',
                    'current' => 'Il vous reste :votes.',
                    'not_enough' => "Il ne vous reste plus de votes",
                ],
            ],

            'poll' => [
                'edit' => 'Modification du sondage',
                'edit_warning' => 'Modifier un sondage supprimera les résultats actuels !',
                'vote' => 'Voter',

                'button' => [
                    'change_vote' => 'Changer de vote',
                    'edit' => 'Modifier le sondage',
                    'view_results' => 'Voir les résultats',
                    'vote' => 'Voter',
                ],

                'detail' => [
                    'end_time' => 'Le sondage se termine le :time',
                    'ended' => 'Sondage terminé le :time',
                    'results_hidden' => 'Les résultats seront affichés après la fin du sondage.',
                    'total' => 'Total de votes : :count',
                ],
            ],
        ],

        'watch' => [
            'to_not_watching' => 'Vous ne suivez pas ce sujet',
            'to_watching' => 'Suivre',
            'to_watching_mail' => 'Suivre avec notifications',
            'tooltip_mail_disable' => 'Les notification sont activées. Cliquez pour les désactiver',
            'tooltip_mail_enable' => 'Les notifications sont désactivées. Cliquez pour les activer',
        ],
    ],
];
