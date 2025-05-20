<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationChannel extends Model
{
    /** @use HasFactory<\Database\Factories\NotificationChanelFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
    ];
}
