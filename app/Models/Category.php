<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    public function articles() : HasMany
    {
        return $this->hasMany(Article::class)
        ->whereNotNull('is_accepted')
        ->where('is_accepted', true);
    }

    use HasFactory;
    protected $fillable = [
        'name',
    ];
}