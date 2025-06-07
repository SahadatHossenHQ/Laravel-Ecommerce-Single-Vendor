<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the product that owns the download.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function downloadUserProducts()
    {
        return $this->hasMany(DownloadUserProduct::class, 'download_id');
    }
}
