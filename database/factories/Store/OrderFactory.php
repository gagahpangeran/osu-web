<?php

// Copyright (c) ppy Pty Ltd <contact@ppy.sh>. Licensed under the GNU Affero General Public License v3.0.
// See the LICENCE file in the repository root for full licence text.

declare(strict_types=1);

namespace Database\Factories\Store;

use App\Models\Store\Order;
use App\Models\User;
use Carbon\Carbon;
use Database\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
        ];
    }

    public function paid(): static
    {
        $date = Carbon::now();

        return $this->state([
            'paid_at' => $date,
            'status' => 'paid',
            'transaction_id' => "test-{$date->timestamp}",
        ]);
    }

    public function incart(): static
    {
        return $this->state(['status' => Order::STATUS_INCART]);
    }

    public function paymentApproved(): static
    {
        return $this->state(['status' => Order::STATUS_PAYMENT_APPROVED]);
    }

    public function paymentRequested(): static
    {
        return $this->state(['status' => Order::STATUS_PAYMENT_REQUESTED]);
    }

    public function shipped(): static
    {
        return $this->state(['status' => Order::STATUS_SHIPPED]);
    }

    public function shopify(): static
    {
        return $this->state(['provider' => Order::PROVIDER_SHOPIFY]);
    }
}
