<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

namespace App\Notifications;

use App\Models\User;
use App\Models\UserReport;
use GuzzleHttp\RequestOptions;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Channels\SlackWebhookChannel;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class UserReportNotification extends Notification implements ShouldQueue
{
    use Queueable;

    const HTTP_OPTIONS = [
        RequestOptions::CONNECT_TIMEOUT => 5,
        RequestOptions::TIMEOUT => 5,
    ];

    private $reporter;

    public function __construct(User $reporter)
    {
        $this->reporter = $reporter;
    }

    public function toSlack(UserReport $notifiable): SlackMessage
    {
        return (new SlackMessage())
            ->http(static::HTTP_OPTIONS)
            ->attachment(function ($attachment) use ($notifiable) {
                $reportable = $notifiable->reportable;
                $reportableUrl = null;
                if ($reportable !== null && method_exists($reportable, 'url')) {
                    $reportableUrl = $reportable->url();
                }

                $user = $notifiable->user?->username ?? "User {$notifiable->user_id}";
                $userUrl = route('users.show', ['user' => $notifiable->user_id]);

                $reportedText =
                    $reportableUrl !== null
                    ? "<{$reportableUrl}|{$notifiable->reportable_type} {$notifiable->reportable_id}>"
                    : "{$notifiable->reportable_type} {$notifiable->reportable_id}";

                $fields = [
                    'Reporter' => $this->discordMarkdownLink($this->reporter->url(), $this->reporter->username),
                    'Reported' => $reportedText,
                    'User' => $this->discordMarkdownLink($userUrl, $user),
                    'Reason' => $notifiable->reason,
                ];

                $additionalInfo = $reportable?->reportableAdditionalInfo();
                if ($additionalInfo !== null) {
                    $fields['Additional Info'] = $additionalInfo;
                }

                $attachment
                    ->color('warning')
                    ->content($notifiable->comments)
                    ->fields($fields);
            });
    }

    public function via($notifiable)
    {
        // see https://github.com/laravel/slack-notification-channel/issues/68#issuecomment-2569304703
        return SlackWebhookChannel::class;
    }

    private function discordMarkdownLink(string $url, string $text): string
    {
        // I couldn't find any way to escape them so this seems to be the next best thing.
        // The alternative characters were taken from https://github.com/python-discord/sir-lancebot/pull/820
        $text = strtr($text, ['[' => '⦋', ']' => '⦌']);

        return "[{$text}]({$url})";
    }
}
