<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get all of the products that are assigned this sub category.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Get the category that owns the sub category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function miniCategory()
    {
        return $this->hasMany(miniCategory::class,'category_id');
    }
}
