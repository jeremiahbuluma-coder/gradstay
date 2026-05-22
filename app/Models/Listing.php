<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Listing extends Model
{
    protected $fillable = [

        'title',
        'location',
        'price',
        'description',

        // IMAGE
        'image',
        'image_url',

        // VIDEO
        'video',
        'video_url',
    ];

    // =========================
    // RELATIONSHIP
    // =========================
    public function bookings(): HasMany
    {
        return $this->hasMany(\App\Models\Booking::class);
    }
}