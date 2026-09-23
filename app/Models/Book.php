<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'synopsis',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }
}