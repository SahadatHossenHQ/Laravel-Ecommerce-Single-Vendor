<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
     protected $guarded = ['id'];
     public function attributes()
    {
        return $this->belongsTo(Attribute::class);
    }
}
