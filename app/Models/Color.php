<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the products that are assigned this color.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
