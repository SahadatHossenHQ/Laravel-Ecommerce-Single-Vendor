<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaingProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function cam_products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
   
    
    
}
