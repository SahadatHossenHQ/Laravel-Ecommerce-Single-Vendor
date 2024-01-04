<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function wishlist()
    {
        return $this->belongsToMany(Product::class,wishlist::class,'id');
    }
}
