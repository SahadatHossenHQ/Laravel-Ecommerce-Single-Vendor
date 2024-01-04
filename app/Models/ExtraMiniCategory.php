<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraMiniCategory extends Model
{
    use HasFactory;
      protected $guarded = ['id'];
       public function miniCategory()
    {
        return $this->belongsTo(miniCategory::class);
    }
     public function products()
    {
        return $this->belongsToMany(Product::class);
    }

}
