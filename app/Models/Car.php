<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    protected $fillable =
    [
    'name', 'description', 'speed', 'durability', 'boost', 'category_id',
    ];
}