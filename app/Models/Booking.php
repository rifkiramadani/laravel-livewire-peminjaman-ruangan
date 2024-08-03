<?php

namespace App\Models;

use App\Models\User;
use App\Models\BookingDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bookingDetails() {
        return $this->hasMany(BookingDetail::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
