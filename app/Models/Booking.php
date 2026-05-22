<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Listing;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'listing_id',
        'start_date',
        'end_date',
        'total_price',
        'status'
    ];

    /*
    |-----------------------------------------
    | Booking belongs to User
    |-----------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |-----------------------------------------
    | Booking belongs to Listing
    |-----------------------------------------
    */
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}