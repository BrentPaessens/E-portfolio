<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relationship between models
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();   // an booking belongs to a "user"
    }
}
