<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    /** @use HasFactory<\Database\Factories\NotificationFactory> */
    use HasFactory;

    protected $fillable = [
        'notification_group_id',
        'type',
        'title',
    ];

    public function notificationGroup(): BelongsTo
    {
        return $this->belongsTo(NotificationGroup::class);
    }
}
