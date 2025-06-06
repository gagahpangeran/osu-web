<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'availability' => [
        'disabled' => 'هذه الخريطة غير متوفرة حاليا للتحميل.',
        'parts-removed' => 'تمت إزالة أجزاء من هذه الخريطة بناء على طلب المنشئ أو صاحب حقوق من طرف ثالث.',
        'more-info' => 'تحقق هنا للمزيد من المعلومات.',
        'rule_violation' => 'تمت إزالة بعض المحتويات من هذه الخريطة بعد معرفة آنها غير ملائمة لـosu!.',
    ],

    'cover' => [
        'deleted' => 'خريطة محذوفة',
    ],

    'download' => [
        'limit_exceeded' => 'تَمهل, ألعب أكثر.',
        'no_mirrors' => '',
    ],

    'featured_artist_badge' => [
        'label' => 'الفنانين المميزين',
    ],

    'index' => [
        'title' => 'قائمة الخرائط',
        'guest_title' => 'الخرائط',
    ],

    'panel' => [
        'empty' => 'لا توجد خرائط',

        'download' => [
            'all' => 'تنزيل',
            'video' => 'تنزيل مع الفيديو',
            'no_video' => 'تنزيل بدون فيديو',
            'direct' => 'فتح في osu!direct',
        ],
    ],

    'nominate' => [
        'bng_limited_too_many_rulesets' => 'لا يمكن للمرشِّح تحت فترة التجربة ترشيح عدة قواعد.',
        'full_nomination_required' => 'عليك أن تكون مرشِّحاً مكتملاً من أجل الترشيح النهائي لقاعدة.',
        'hybrid_requires_modes' => 'تحتاج الخرائط الهجينة إلى تحديد وضع تشغيل واحد على الأقل لِتَرشيحِها.',
        'incorrect_mode' => 'ليس لديك الصلاحيّات الكافية للترشيح للوضوع: :mode',
        'invalid_limited_nomination' => 'لخريطة الإيقاع هذه ترشيحات لاغية تمنع تأهيلها حالياً.',
        'invalid_ruleset' => 'يشمل هذا الترشيح أنماط لاغية.',
        'too_many' => 'تم بالفعل استيفاء شرط الترشيح.',
        'too_many_non_main_ruleset' => 'تم استيفاء متطلّب ترشيح النمط غير الأساسي بالفعل.',

        'dialog' => [
            'confirmation' => 'هل أنت متأكد من أنك تريد ترشيح هذه الخريطة؟',
            'different_nominator_warning' => '',
            'header' => 'ترشيح خريطة',
            'hybrid_warning' => 'ملاحظة: يمكنك أن ترشح مرة واحدة فقط، لذا يرجى التأكد من أنك ترشح لجميع أنماط اللعبة التي تنويها',
            'current_main_ruleset' => 'النمط الرئيسي حالياً: :ruleset',
            'which_modes' => 'ترشيح لأي وضع؟',
        ],
    ],

    'nsfw_badge' => [
        'label' => 'حَساس',
    ],

    'show' => [
        'discussion' => 'مناقشة',

        'admin' => [
            'full_size_cover' => 'عرض صورة الغلاف بحجمها الكامل',
        ],

        'deleted_banner' => [
            'title' => 'تم حذف هذه الخريطة.',
            'message' => '(يمكن للمشرفين فقط رؤية هذا)',
        ],

        'details' => [
            'by_artist' => 'بواسطة :artist',
            'favourite' => 'تفضيل هذه الخريطة',
            'favourite_login' => 'قم بتسجيل الدخول لتفضيل هذه الخريطة',
            'logged-out' => 'تحتاج إلى تسجيل الدخول قبل تنزيل أي خريطة!',
            'mapped_by' => 'نشأت بواسطة :mapper',
            'mapped_by_guest' => 'صعوبة إضافية بواسطة :mapper',
            'unfavourite' => 'إلغاء تفضيل هذه الخريطة',
            'updated_timeago' => 'آخر تحديث :timeago',

            'download' => [
                '_' => 'تنزيل',
                'direct' => '',
                'no-video' => 'دون الفيديو',
                'video' => 'مع الفيديو',
            ],

            'login_required' => [
                'bottom' => 'للحصول على المزيد من الميزات',
                'top' => 'تسجيل الدخول',
            ],
        ],

        'details_date' => [
            'approved' => 'مقبولة :timeago',
            'loved' => 'loved :timeago',
            'qualified' => 'مؤهل timeago:',
            'ranked' => 'ranked :timeago',
            'submitted' => 'مُقدَمَة :timeago',
            'updated' => 'آخر تحديث :timeago',
        ],

        'favourites' => [
            'limit_reached' => 'لديك عدد كبير جداََ من الخرائط المحبوبة! رجائاََ قم بألغاء بعضها قبل المحاولة مجدداََ.',
        ],

        'hype' => [
            'action' => 'اَشِد هذه الخريطة ان احببت لعبها لمساعدتها لاِحتلال حالة <strong>Ranked</strong>.',

            'current' => [
                '_' => 'هذه الخريطة حاليا :status.',

                'status' => [
                    'pending' => 'مُعلَقة',
                    'qualified' => 'مؤهلة',
                    'wip' => 'قيد العمل',
                ],
            ],

            'disqualify' => [
                '_' => 'اذا وجدت مشكلة مع الأغنية, ارجوك قم بأِلغاء تأهيلها :link.',
            ],

            'report' => [
                '_' => 'اذا كانت لديك مشكلة مع الخريطة رجائا ابلغ عنها :link لتنبيه فريق الدعم.',
                'button' => 'الإبلاغ عن مشكلة',
                'link' => 'هنا',
            ],
        ],

        'info' => [
            'description' => 'الوصف',
            'genre' => 'النوع',
            'language' => 'اللغة',
            'mapper_tags' => '',
            'no_scores' => 'لا تزال البيانات تُحسب...',
            'nominators' => 'المُرَشِحون',
            'nsfw' => 'محتوى حساس',
            'offset' => 'الإزاحة عبر الإنترنت',
            'points-of-failure' => 'نقاط الفشل',
            'source' => 'المصدر',
            'storyboard' => 'تحتوي هذه الخريطة على لوحة قصصية',
            'success-rate' => 'معدل النجاح',
            'user_tags' => '',
            'video' => 'تحتوي هذه الخريطة على فيديو',
        ],

        'nsfw_warning' => [
            'details' => 'تحتوي هذه الخريطة على محتوى حساس أو مسيء أو مقلق. هل ترغب في عرضها على أي حال؟',
            'title' => 'محتوى حساس',

            'buttons' => [
                'disable' => 'تعطيل التحذيرات',
                'listing' => 'قائمة الخرائط',
                'show' => 'عرض',
            ],
        ],

        'scoreboard' => [
            'achieved' => 'احتُلت عند :when',
            'country' => 'ترتيب الدولة',
            'error' => 'فشل تحميل الترتيب',
            'friend' => 'ترتيب الأصدقاء',
            'global' => 'الترتيب العالمي',
            'supporter-link' => 'اضغط <a href=":link">هنا</a> لمشاهدة كل الميزات الرائعة التي تحصل عليها!',
            'supporter-only' => 'تحتاج ان تكون osu!supporter للوصول الى ترتيب الدولة والأصدقاء!',
            'team' => '',
            'title' => 'لوح النتائج',

            'headers' => [
                'accuracy' => 'الدقة',
                'combo' => 'اقصى كومبو',
                'miss' => 'اِخفاق',
                'mods' => 'المودات',
                'pin' => 'ثبّت',
                'player' => 'اللاعب',
                'pp' => '',
                'rank' => 'المرتبه',
                'score' => 'المجموع',
                'score_total' => 'مجموع النقاط',
                'time' => 'الوقت',
            ],

            'no_scores' => [
                'country' => 'لا احد من دولتك حصل على نتيجة بهذه الخريطة بعد!',
                'friend' => 'لا احد من اصدقائك حصل على نتيجة بهذه الخريطة بعد!',
                'global' => 'لا نتيجة بعد. ربما عليك الحصول على واحدة؟',
                'loading' => 'جارِ تحميل النتائج...',
                'team' => '',
                'unranked' => 'خريطة ليست مصنفة.',
            ],
            'score' => [
                'first' => 'في المقدمة',
                'own' => 'أفضل ما لديك',
            ],
            'supporter_link' => [
                '_' => 'انقر :here لرؤية جميع الميزات الرائعة التي ستحصل عليها!',
                'here' => 'هتا',
            ],
        ],

        'stats' => [
            'cs' => 'حجم الدائرة',
            'cs-mania' => 'عدد المفاتيح',
            'drain' => 'استنزاف HP',
            'accuracy' => 'الدقة',
            'ar' => 'معدل الوصول',
            'stars' => 'نجوم الصعوبة',
            'total_length' => 'الطول',
            'bpm' => 'BPM',
            'count_circles' => 'عدد الدوائر',
            'count_sliders' => 'عدد المنزلقات',
            'offset' => 'الإزاحة على الإنترنت: :offset',
            'user-rating' => 'تصنيف المستخدم',
            'rating-spread' => 'انتشار التصنيف',
            'nominations' => 'الترشيحات',
            'playcount' => 'مرات اللعب',
        ],

        'status' => [
            'ranked' => 'Ranked',
            'approved' => 'مقبولة',
            'loved' => 'Loved',
            'qualified' => 'مؤهلة',
            'wip' => 'جارية',
            'pending' => 'معلقة',
            'graveyard' => 'مقبورة',
        ],
    ],

    'spotlight_badge' => [
        'label' => 'تسليط الضوء',
    ],
];
