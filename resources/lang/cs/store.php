<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'cart' => [
        'checkout' => 'Zaplatit',
        'empty_cart' => 'Odebrat všechny položky z košíku',
        'info' => ':count_delimited položka v košíku ($:subtotal)|:count_delimited položky v košíku ($:subtotal)|:count_delimited položek v košíku ($:subtotal)',
        'more_goodies' => 'Chci se ještě podívat na nějaké dobroty než dokončím objednávku',
        'shipping_fees' => 'poplatky za dopravu',
        'title' => 'Nákupní košík',
        'total' => 'celkem',

        'errors_no_checkout' => [
            'line_1' => 'Ale né! Nastaly problémy s vaším košíkem, které zabraňují zaplacení!',
            'line_2' => 'Pro pokračování odstraňte nebo aktualizujte předměty nahoře.',
        ],

        'empty' => [
            'text' => 'Váš košík je prázdný.',
            'return_link' => [
                '_' => 'Vrať se na :link, abys našel nějaké skvělé věci!',
                'link_text' => 'věci v obchodě',
            ],
        ],
    ],

    'checkout' => [
        'cart_problems' => 'Ale né, s tvým košíkem se vyskytly nějaké potíže!',
        'cart_problems_edit' => 'Pro editaci klikni sem.',
        'declined' => 'Tvá platba byla zrušena.',
        'delayed_shipping' => 'V tuto chvíli jsme zahlceni objednávkami! Svou objednávku můžeš umístit, ale počítej prosím s **dalšími 1-2 týdny zpoždění** zatímco dokončíme už existující objednávky.',
        'hide_from_activity' => 'Schovat všechny osu!supporter tagy v této objednávce z mých aktivit',
        'old_cart' => 'Obsah tvého košíku se zdá být zastaralý a proto byl znovu načten, zkus to prosím znovu.',
        'pay' => 'Zaplatit přes PayPal',
        'title_compact' => 'zaplatit',

        'has_pending' => [
            '_' => 'Máte nedokončené platby, klikněte na :link pro zobrazení.',
            'link_text' => 'zde',
        ],

        'pending_checkout' => [
            'line_1' => 'Předchozí nákup nebyl dokončen.',
            'line_2' => 'Pokračujte v platbě vybráním platební metody.',
        ],
    ],

    'discount' => 'ušetři :percent%',
    'free' => 'zdarma!',

    'invoice' => [
        'contact' => 'Kontakt:',
        'date' => 'Datum:',
        'echeck_delay' => 'Jelikož vaše platba byla prováděna službou eCheck, prosím, dejte nám až 10 dní na to, aby platba úspěšně prošla přes PayPal!',
        'echeck_denied' => 'eCheck platba byla zamítnuta PayPalem.',
        'hide_from_activity' => 'osu!supporter tagy v této objednávce se nebudou zobrazovat v nedávných aktivitách.',
        'sent_via' => 'Odesláno přes:',
        'shipping_to' => 'Místo doručení:',
        'title' => 'Faktura',
        'title_compact' => 'faktura',

        'status' => [
            'cancelled' => [
                'title' => 'Vaše objednávka byla zrušena',
                'line_1' => [
                    '_' => "Pokud jste nepožádali o zrušení, kontaktujte prosím :link se svým číslem objednávky (#:order_number).",
                    'link_text' => 'podporu osu!store',
                ],
            ],
            'delivered' => [
                'title' => 'Vaše objednávka byla doručena! Doufáme, že si ji užíváte!',
                'line_1' => [
                    '_' => 'Pokud máte nějaké problémy s vaším nákupem, kontaktujte prosím :link.',
                    'link_text' => 'podporu osu!store',
                ],
            ],
            'prepared' => [
                'title' => 'Vaše objednávka se připravuje!',
                'line_1' => 'Počkejte prosím o něco déle, než bude zásilka odeslána. Informace pro sledování se zobrazí zde, jakmile bude objednávka zpracována a odeslána. To může trvat až 5 dní (ale obvykle méně!) v závislosti na tom, jak jsme zaneprázdněni.',
                'line_2' => 'Všechny objednávky zasíláme z Japonska pomocí různých přepravních služeb v závislosti na váze a hodnotě. Tato oblast bude po odeslání objednávky specifikována.',
            ],
            'processing' => [
                'title' => 'Vaše platba nebyla ještě potvrzena!',
                'line_1' => 'Pokud jste už zaplatil, možná stále čekáme na potvrzení vaší platby. Prosím, dejte nám pár minut a pak zkuste znovu načíst tuto stránku!',
                'line_2' => [
                    '_' => 'Pokud se vyskytl problém při placení, :link',
                    'link_text' => 'klikněte zde pro pokračování v placení',
                ],
            ],
            'shipped' => [
                'title' => 'Vaše objednávka byla odeslána!',
                'tracking_details' => 'Detaily o sledování:',
                'no_tracking_details' => [
                    '_' => "Vzhledem k tomu, že jsme vaši zásilku poslali přes Air Mail, nemáme detaily pro její sledování, ale můžete ji očekávat během 1-3 týdnů. Pro Evropu někdy může celní správa zpozdit dopravu zásilky o něco déle. Pokud máte jakékoli obavy, prosím odpovězte na email o potvrzení objednávky, který jste obdrželi (nebo :link).",
                    'link_text' => 'napište nám email',
                ],
            ],
        ],
    ],

    'order' => [
        'cancel' => 'Zrušit objednávku',
        'cancel_confirm' => 'Tato objednávka bude zrušena a platba za ni nebude přijata. Poskytovatel platby nemusí okamžitě uvolnit rezervované finanční prostředky. Jste si jisti?',
        'cancel_not_allowed' => 'Tuto objednávku momentálně nelze zrušit.',
        'invoice' => 'Zobrazit fakturu',
        'no_orders' => 'Nejsou zde žádné objednávky k zobrazení.',
        'paid_on' => 'Objednávka zadána :date',
        'resume' => 'Obnovit objednávku',
        'shipping_and_handling' => 'Přepravné a balné',
        'shopify_expired' => 'Odkaz na objednávku pro tuto objednávku vypršel.',
        'subtotal' => 'Mezisoučet',
        'total' => 'Celkem',

        'details' => [
            'order_number' => 'Objednávka č.',
            'payment_terms' => 'Platební podmínky',
            'salesperson' => 'Prodejce',
            'shipping_method' => 'Způsob dopravy',
            'shipping_terms' => 'Dodací podmínky',
            'title' => 'Detail objednávky',
        ],

        'item' => [
            'quantity' => 'Množství',

            'display_name' => [
                'supporter_tag' => ':name pro :username (:duration)',
            ],

            'subtext' => [
                'supporter_tag' => 'Zpráva: :message',
            ],
        ],

        'not_modifiable_exception' => [
            'cancelled' => 'Nemůžeš upravit svou objednávku, jelikož byla stornována.',
            'checkout' => 'Nemůžeš upravit svou objednávku, jelikož se již zpracovává.', // checkout and processing should have the same message.
            'default' => 'Objednávka je neupravitelná',
            'delivered' => 'Nemůžeš upravit svou objednávku, jelikož již byla doručena.',
            'paid' => 'Nemůžeš upravit svou objednávku, jelikož jsi za ni již zaplatil.',
            'processing' => 'Nemůžeš upravit svou objednávku, jelikož se již zpracovává.',
            'shipped' => 'Nemůžeš upravit svou objednávku, jelikož již byla odeslána.',
        ],

        'status' => [
            'cancelled' => 'Zrušeno',
            'checkout' => 'V přípravě',
            'delivered' => 'Doručeno',
            'paid' => 'Zaplaceno',
            'processing' => 'Očekávající potvrzení',
            'shipped' => 'Na cestě',
            'title' => 'Stav objednávky',
        ],

        'thanks' => [
            'title' => 'Děkujeme za Vaši objednávku!',
            'line_1' => [
                '_' => 'Brzy obdržíte potvrzovací email. Pokud máte nějaké dotazy, :link prosím!',
                'link_text' => 'kontaktujte nás',
            ],
        ],
    ],

    'product' => [
        'name' => 'Název',

        'stock' => [
            'out' => 'Tato položka je momentálně vyprodána. Vrať se prosím později!',
            'out_with_alternative' => 'Tohle zboží bohužel není na skladě. Můžeš použít rozevírací seznam pro výběr jiného druhu nebo to zkusit později!',
        ],

        'add_to_cart' => 'Přidat do košíku',
        'notify' => 'Informujte mě, až bude k dispozici!',
        'out_of_stock' => '',

        'notification_success' => 'dáme ti vědět, až produkt znovu naskladníme. klikněte :link pro zrušení',
        'notification_remove_text' => 'zde',

        'notification_in_stock' => 'Tento produkt je už na skladě!',
    ],

    'supporter_tag' => [
        'gift' => 'darovat hráči',
        'gift_message' => 'přidat volitelnou zprávu k dárku! (maximálně :length znaků)',

        'require_login' => [
            '_' => 'Pro obdržení štítku podporovatele se musíš :link!',
            'link_text' => 'přihlášený',
        ],
    ],

    'username_change' => [
        'check' => 'Zadej uživatelské jméno pro kontrolu dostupnosti!',
        'checking' => 'Probíhá kontrola dostupnosti uživatelského jména :username...',
        'placeholder' => 'Kýžené uživatelské jméno',
        'label' => 'Nové uživatelské jméno',
        'current' => 'Tvoje aktuální uživatelské jméno je ":username".',

        'require_login' => [
            '_' => 'Pro změnu uživatelského jména se musíš :link!',
            'link_text' => 'přihlášený',
        ],
    ],

    'xsolla' => [
        'distributor' => '',
    ],
];
