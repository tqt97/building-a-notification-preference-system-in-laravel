<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NotificationGroup extends Model
{
    /** @use HasFactory<\Database\Factories\NotificationGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
