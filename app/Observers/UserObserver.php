<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $user->notificationPreferences()->sync(
            Notification::get()->mapWithKeys(fn (Notification $notification) => [
                $notification->id => ['channels' => ['mail']],
            ])
        );
    }
}
