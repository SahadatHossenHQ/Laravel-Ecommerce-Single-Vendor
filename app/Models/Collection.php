<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the categories that are assigned this collection.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
