<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'audio' => [
        'autoplay' => 'تشغيل الأغنية التالية تلقائياً',
    ],

    'defaults' => [
        'page_description' => 'osu! - الأغنية قريبة *نقرة* واحدة فقط! مع Ouendan/EBA, تايكو واوضاع اللعب الأصلية, وكذلك مُعدل مستويات متكامل.',
    ],

    'header' => [
        'admin' => [
            'beatmapset' => 'حزمة الأغنية',
            'beatmapset_covers' => 'اغطية الأغاني',
            'contest' => 'مسابقة',
            'contests' => 'المسابقات',
            'root' => 'وحدة التحكم',
        ],

        'artists' => [
            'index' => 'القائمة',
        ],

        'beatmapsets' => [
            'show' => 'معلومات',
            'discussions' => 'المناقشة',
        ],

        'changelog' => [
            'index' => 'جدولة',
        ],

        'help' => [
            'index' => 'الفهرس',
            'sitemap' => 'خارطة الموقع',
        ],

        'store' => [
            'cart' => 'العربة',
            'orders' => 'تاريخ الطلب',
            'products' => 'المنتجات',
        ],

        'tournaments' => [
            'index' => 'جدولة',
        ],

        'users' => [
            'modding' => 'الاِقتراح',
            'playlists' => 'قوائم التشغيل',
            'realtime' => 'لعب جماعي',
            'show' => 'معلومات',
        ],
    ],

    'gallery' => [
        'close' => 'إغلاق (Esc)',
        'fullscreen' => 'تغيير للشاشة الكاملة',
        'zoom' => 'التكبير / التصغير',
        'previous' => 'السابق (السهم اليسار)',
        'next' => 'التالي (السهم اليمين)',
    ],

    'menu' => [
        'beatmaps' => [
            '_' => 'خرائط الموسيقى',
        ],
        'community' => [
            '_' => 'المجتمع',
            'dev' => 'التطوير',
        ],
        'help' => [
            '_' => 'مساعدة',
            'getAbuse' => 'الإبلاغ عن إساءة',
            'getFaq' => 'الأسئلة الشائعة',
            'getRules' => 'القوانين',
            'getSupport' => 'لا، حقاً، أنا بحاجة إلى مساعدة!',
        ],
        'home' => [
            '_' => 'الرئيسية',
            'team' => 'الفريق',
        ],
        'rankings' => [
            '_' => 'الترتيب',
        ],
        'store' => [
            '_' => 'المتجر',
        ],
    ],

    'footer' => [
        'general' => [
            '_' => 'عام',
            'home' => 'الرئيسية',
            'changelog-index' => 'سِجل التغييرات',
            'beatmaps' => 'قائمة الخرائط',
            'download' => 'تحميل osu!',
        ],
        'help' => [
            '_' => 'المساعدة والمجتمع',
            'faq' => 'الأسئلة الشائعة',
            'forum' => 'منتديات المجتمع',
            'livestreams' => 'البث المباشر',
            'report' => 'أبلغ عن مشكلة',
            'wiki' => 'ويكي',
        ],
        'legal' => [
            '_' => 'القوانين والحالات',
            'copyright' => 'حقوق الطبع والنشر (DMCA)',
            'jp_sctl' => '',
            'privacy' => 'الخصوصية',
            'rules' => '',
            'server_status' => 'حالة الخادم',
            'source_code' => 'الشفرة المصدرية',
            'terms' => 'المفردات',
        ],
    ],

    'errors' => [
        '400' => [
            'error' => 'تعديلات الطلب خاطئة',
            'description' => '',
        ],
        '404' => [
            'error' => 'صفحة مفقودة',
            'description' => "عذراً، ولكن الصفحة التي طلبتها ليست هنا!",
        ],
        '403' => [
            'error' => "يجب أن لا تكون هنا.",
            'description' => 'على الرغم من ذلك, يمكنك محاولة العودة.',
        ],
        '401' => [
            'error' => "يجب أن لا تكون هنا.",
            'description' => 'يمكنك العودة رغما عن ذلك. او تسجيل الدخول.',
        ],
        '405' => [
            'error' => 'صفحة مفقودة',
            'description' => "عذراً، ولكن الصفحة التي طلبتها ليست هنا!",
        ],
        '422' => [
            'error' => 'تعديلات الطلب خاطئة',
            'description' => '',
        ],
        '429' => [
            'error' => 'تجاوزت افصى حد',
            'description' => '',
        ],
        '500' => [
            'error' => 'اوه لا! كسر شيء! ;_;',
            'description' => "نحن معلمون تلقائيا بكل خطأ.",
        ],
        'fatal' => [
            'error' => 'اوه لا! كسر شيء (badly)! ;_;',
            'description' => "نحن معلمون تلقائيا بكل خطأ.",
        ],
        '503' => [
            'error' => 'مغلق للصيانة!',
            'description' => "عادة ما تستغرق الصيانة في أي مكان من 5 ثوان لمدة 10 دقائق. إذا كنا مغلقين لفترة أطول، انظر الى :link لمزيد من المعلومات.",
            'link' => [
                'text' => '',
                'href' => '',
            ],
        ],
        // used by sentry if it returns an error
        'reference' => "فقط في حالة، هنا رمز يمكنك إعطاءه للدعم!",
    ],

    'popup_login' => [
        'button' => 'تسجيل الدخول / إنشاء حساب',

        'login' => [
            'forgot' => "لقد نسيت بياناتي",
            'password' => 'كلمة السر',
            'title' => 'قم بتسجيل الدخول للمتابعة',
            'username' => 'اسم المستخدم',

            'error' => [
                'email' => "إسم المستخدم أو كلمة المرور غير موجودة",
                'password' => 'كلمة المرور غير صحيحة',
            ],
        ],

        'register' => [
            'download' => 'تحميل',
            'info' => 'تحتاج الى حساب، سيدي. لماذا لا تملك واحد اساساََ؟',
            'title' => "ليس لديك حساب؟",
        ],
    ],

    'popup_user' => [
        'links' => [
            'account-edit' => 'الاعدادات',
            'follows' => 'قوائم المشاهدة',
            'friends' => 'الأصدقاء',
            'legacy_score_only_toggle' => 'وضع ليزر',
            'legacy_score_only_toggle_tooltip' => 'يُظهر وضع ليزر الدرجات التي سُجّلت في ليزر وبخوارزمية تدريج جديدة',
            'logout' => 'تسجيل الخروج',
            'profile' => 'الصفحة الشخصية',
            'scoring_mode_toggle' => '',
            'scoring_mode_toggle_tooltip' => '',
            'team' => '',
        ],
    ],

    'popup_search' => [
        'initial' => 'اكتب للبحث!',
        'retry' => 'فشل البحث. انقر لإعادة المحاولة.',
    ],
];
