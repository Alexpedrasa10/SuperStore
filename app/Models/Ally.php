<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Ally extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'ally_categories', 'ally_id', 'category_id');
    }
}
