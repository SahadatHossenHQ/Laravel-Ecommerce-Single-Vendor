<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miniCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
     public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class,'category_id');
    }
      public function extraCategory()
    {
        return $this->hasMany(ExtraMiniCategory::class);
    }
}
