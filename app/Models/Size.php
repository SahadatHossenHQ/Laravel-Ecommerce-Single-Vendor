<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the products that are assigned this size.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
