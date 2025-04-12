<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Evenement extends Model
{
    use HasFactory;

    // Relationship between models
    public function genre()
    {
        return $this->belongsTo(Genre::class)->withDefault();   // a evenement belongs to a "genre"
    }
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //  Apply the scope to a given Eloquent query builder
    public function scopeSearchEvent($query, $search = '%')
    {
        return $query->where('naam', 'like', "%$search%");
    }

    protected function cover(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $basePath = 'covers/' . $attributes['naam'];
                $extensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
                foreach ($extensions as $ext) {
                    $imagePath = $basePath . '.' . $ext;
                    if (Storage::disk('public')->exists($imagePath)) {
                        return Storage::url($imagePath);
                    }
                }
                return Storage::url('covers/NO-Image.jpg');
            },
        );
    }
    protected $appends = [ 'cover'];

}
