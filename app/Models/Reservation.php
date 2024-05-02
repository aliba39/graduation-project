<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'family_name', 'phone_number', 'address', 'city', 'country', 'number_people', 'birth_certificate', 'passport', 'offer_id', 'user_id',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id'); 
    }
}
