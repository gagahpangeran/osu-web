<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

return [
    'availability' => [
        'disabled' => '该谱面现在无法下载。',
        'parts-removed' => '应歌曲作者或第三方版权持有者的要求，已移除这张谱面的部分内容。',
        'more-info' => '点击这里查看更多信息。',
        'rule_violation' => '已在审核后移除了谱面中不适合于 osu! 展示的内容。',
    ],

    'cover' => [
        'deleted' => '已删除的谱面',
    ],

    'download' => [
        'limit_exceeded' => '慢一点，打几张图再回来吧。',
        'no_mirrors' => '没有可用的下载服务器。',
    ],

    'featured_artist_badge' => [
        'label' => '精选艺术家',
    ],

    'index' => [
        'title' => '谱面列表',
        'guest_title' => '谱面',
    ],

    'panel' => [
        'empty' => '没有谱面',

        'download' => [
            'all' => '下载',
            'video' => '包含视频下载',
            'no_video' => '不含视频下载',
            'direct' => '在 osu!direct 中查看',
        ],
    ],

    'nominate' => [
        'bng_limited_too_many_rulesets' => '见习谱面提名成员 (PBN) 无法提名多模式谱面。',
        'full_nomination_required' => '只有正式谱面审核成员 (Full)，才能作出所属游戏模式的最终提名。',
        'hybrid_requires_modes' => '您需要在多模式谱面中选择至少一个游戏模式并提名。',
        'incorrect_mode' => '您没有提名 :mode 模式的权限。',
        'invalid_limited_nomination' => '谱面含有无效提名，无法在此状态下过审 (Qualified)。',
        'invalid_ruleset' => '这个提名含有无效的游戏模式。',
        'too_many' => '提名需求已达标。',
        'too_many_non_main_ruleset' => '除了主游戏模式之外，其他模式的提名要求已经达成。',

        'dialog' => [
            'confirmation' => '您确定要提名这张谱面吗？',
            'different_nominator_warning' => '如果谱面的提名者发生了变更，那么在谱面过审后，它在过审区的队列位置将重置。',
            'header' => '提名谱面',
            'hybrid_warning' => '注意：您只能提名一次，所以请确保提名包含所有您想要提名的游戏模式。',
            'current_main_ruleset' => '主游戏模式：:ruleset',
            'which_modes' => '您要提名哪种模式？',
        ],
    ],

    'nsfw_badge' => [
        'label' => '不良内容',
    ],

    'show' => [
        'discussion' => '讨论',

        'admin' => [
            'full_size_cover' => '查看完整封面图',
        ],

        'deleted_banner' => [
            'title' => '此谱面已删除。',
            'message' => '（仅管理员可见）',
        ],

        'details' => [
            'by_artist' => 'by :artist',
            'favourite' => '收藏这张谱面',
            'favourite_login' => '登录以收藏这张谱面',
            'logged-out' => '下载谱面前请先登录！',
            'mapped_by' => '谱师：:mapper',
            'mapped_by_guest' => ':mapper 的客串难度',
            'unfavourite' => '取消收藏',
            'updated_timeago' => ':timeago 更新',

            'download' => [
                '_' => '下载',
                'direct' => '',
                'no-video' => '不包含视频',
                'video' => '包含视频',
            ],

            'login_required' => [
                'bottom' => '以使用更多的功能',
                'top' => '登录',
            ],
        ],

        'details_date' => [
            'approved' => ':timeago 达标 (Approved)',
            'loved' => ':timeago 加入社区喜爱 (Loved)',
            'qualified' => ':timeago 过审 (Qualified)',
            'ranked' => ':timeago 上架 (Ranked)',
            'submitted' => ':timeago 提交',
            'updated' => ':timeago 更新',
        ],

        'favourites' => [
            'limit_reached' => '谱面收藏数超出限制，请删除一些后再试。',
        ],

        'hype' => [
            'action' => '如果你觉得这张谱面很好玩，来推荐谱面并推动它进入<strong>上架 (Ranked)</strong> 状态。',

            'current' => [
                '_' => '谱面正处于 :status 状态。',

                'status' => [
                    'pending' => '待定 (Pending)',
                    'qualified' => '过审 (Qualified)',
                    'wip' => '制作中 (WIP)',
                ],
            ],

            'disqualify' => [
                '_' => '如果你认为此谱面有问题，可以按下 :link 取消提名。',
            ],

            'report' => [
                '_' => '如果您发现此谱面有问题，请前往 :link 通知审核团队。',
                'button' => '报告问题',
                'link' => '这里',
            ],
        ],

        'info' => [
            'description' => '谱面介绍',
            'genre' => '流派',
            'language' => '语言',
            'mapper_tags' => '谱师标签',
            'no_scores' => '数据还在计算中……',
            'nominators' => '提名者',
            'nsfw' => '不良内容',
            'offset' => '在线偏移值',
            'points-of-failure' => '失败位置',
            'source' => '来源',
            'storyboard' => '此谱面包含故事板',
            'success-rate' => '成功率',
            'user_tags' => '玩家标签',
            'video' => '此谱面包含视频',
        ],

        'nsfw_warning' => [
            'details' => '此谱面包含少儿不宜、冒犯性或令人不安的内容。您仍然想查看它吗？',
            'title' => '不良内容',

            'buttons' => [
                'disable' => '关闭警告',
                'listing' => '返回谱面列表',
                'show' => '显示',
            ],
        ],

        'scoreboard' => [
            'achieved' => '在 :when 达成',
            'country' => '地区排名',
            'error' => '加载排名失败',
            'friend' => '好友排名',
            'global' => '全球排名',
            'supporter-link' => '点击 <a href=":link">这里</a> 来查看你得到的精彩功能！',
            'supporter-only' => '你需要成为 osu! 支持者才能查看地区/好友/特定 Mod 排名！',
            'team' => '战队排名',
            'title' => '排行榜',

            'headers' => [
                'accuracy' => '准确率',
                'combo' => '最大连击',
                'miss' => 'Miss',
                'mods' => '模组',
                'pin' => '置顶',
                'player' => '玩家',
                'pp' => '',
                'rank' => '排名',
                'score' => '得分',
                'score_total' => '得分',
                'time' => '达成时间',
            ],

            'no_scores' => [
                'country' => '您所在的国家/地区中还没有玩家上传过成绩！',
                'friend' => '还没有好友上传成绩！',
                'global' => '还没有玩家上传过成绩，来玩一把？',
                'loading' => '加载成绩中...',
                'team' => '您所在的战队中还没有玩家上传过成绩！',
                'unranked' => '未上架 (Unranked) 谱面',
            ],
            'score' => [
                'first' => '领先',
                'own' => '个人最佳成绩',
            ],
            'supporter_link' => [
                '_' => '点击 :here 查看您获得的所有精彩功能！',
                'here' => '这里',
            ],
        ],

        'stats' => [
            'cs' => '圆圈大小',
            'cs-mania' => '按键数量',
            'drain' => '掉血速度',
            'accuracy' => '准度要求',
            'ar' => '缩圈速度',
            'stars' => '难度星级',
            'total_length' => '长度（游玩长度：:hit_length）',
            'bpm' => 'BPM',
            'count_circles' => '圆圈总数',
            'count_sliders' => '滑条总数',
            'offset' => '在线偏移值：:offset',
            'user-rating' => '玩家评价',
            'rating-spread' => '评分情况',
            'nominations' => '提名状态',
            'playcount' => '游玩次数',
        ],

        'status' => [
            'ranked' => '上架',
            'approved' => '达标',
            'loved' => '社区喜爱',
            'qualified' => '过审',
            'wip' => '制作中',
            'pending' => '待定',
            'graveyard' => '坟场',
        ],
    ],

    'spotlight_badge' => [
        'label' => '聚光灯',
    ],
];
