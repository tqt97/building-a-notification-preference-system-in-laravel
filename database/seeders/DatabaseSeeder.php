<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\NotificationChannel;
use App\Models\NotificationGroup;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        NotificationChannel::factory()->create(
            [
                'title' => 'Email',
                'type' => 'email',
            ],
        );
        NotificationChannel::factory()->create(
            [
                'title' => 'SMS',
                'type' => 'sms',
            ],
        );
        NotificationChannel::factory()->create(
            [
                'title' => 'Slack',
                'type' => 'slack',
            ],
        );

        NotificationGroup::factory()->create(
            [
                'title' => 'Group 1',
            ]
        );
        NotificationGroup::factory()->create(
            [
                'title' => 'Group 2',
            ]
        );

        Notification::factory()->create(
            [
                'title' => 'Notification 1',
                'type' => 'email',
                'notification_group_id' => 1,
            ]
        );

        Notification::factory()->create(
            [
                'title' => 'Notification 2',
                'type' => 'sms',
                'notification_group_id' => 2,
            ]
        );

        Notification::factory()->create(
            [
                'title' => 'Notification 3',
                'type' => 'slack',
                'notification_group_id' => 1,
            ]
        );

        User::factory()->create([
            'name' => 'TuanTQ',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
        ]);
    }
}
