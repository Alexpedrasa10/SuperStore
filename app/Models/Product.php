<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image_url', 'cta_url'];

    public function categories() :BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}

