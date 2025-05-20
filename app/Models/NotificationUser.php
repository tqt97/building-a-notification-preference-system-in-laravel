<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class NotificationUser extends Pivot
{
    protected $casts = [
        'channels' => 'array',
    ];
}
