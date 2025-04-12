<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    // Relationship between models
    public function evenements()
    {
        return $this->hasMany(Evenement::class);   // a genre can be assigned to multiple "evenements"
    }

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
