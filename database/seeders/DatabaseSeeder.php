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

        $projects = NotificationGroup::firstOrCreate(['title' => 'Projects']);
        $projects->notifications()->firstOrCreate(['type' => 'project_created', 'title' => 'A new project is created']);
        $projects->notifications()->firstOrCreate(['type' => 'project_comment_created', 'title' => 'A comment is posted in a project']);
        $projects->notifications()->firstOrCreate(['type' => 'project_mentioned', 'title' => 'I\'m mentioned in a project']);
        $projects->notifications()->firstOrCreate(['type' => 'project_overdue', 'title' => 'A project is overdue']);

        $files = NotificationGroup::firstOrCreate(['title' => 'Files']);
        $files->notifications()->firstOrCreate(['type' => 'file_created', 'title' => 'A new file is uploaded']);
        $files->notifications()->firstOrCreate(['type' => 'file_requires_approval', 'title' => 'A file requires my approval']);
        $files->notifications()->firstOrCreate(['type' => 'file_deleted', 'title' => 'A file is deleted']);

        User::factory()->create([
            'name' => 'TuanTQ',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
        ]);
    }
}
