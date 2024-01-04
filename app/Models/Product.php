<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    
    /**
     * Get the user that owns the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function author()
    {
        return $this->belongsTo(Author::class);
    }
    
    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get the download product for the product.
     */
    public function downloads()
    {
        return $this->hasMany(DownloadProduct::class);
    }

    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get all of the tags for the product.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get all of the categories for the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
      /**
     * Get all of the categories for the product.
     */
    public function categories2()
    {
        return $this->belongsToMany(Category::class)->where('status', 1);
    }

    /**
     * Get all of the sub_categories for the product.
     */
    public function sub_categories()
    {
        return $this->belongsToMany(SubCategory::class);
    }
    public function mini_categories()
    {
        return $this->belongsToMany(miniCategory::class);
    }
    public function extra_categories()
    {
        return $this->belongsToMany(ExtraMiniCategory::class);
    }
     public function campaigns()
    {
        return $this->belongsToMany(Campaign::class,'campaing_products');
    }
    /**
     * Get all of the sizes for the product.
     */
    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    /**
     * Get all of the colors for the product.
     */
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
     /**
     * Get all of the colors for the product.
     */
    public function attributes_values()
    {
        return $this->belongsToMany(AttributeValue::class,'attribute_product');
    }

    /**
     * Get the order details for the product.
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
    public function campaingProduct()
    {
        return $this->hasMany(CampaingProduct::class);
    }

    /**
     * Get the comments for the product.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the reviews for the product.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    public function userDownloadProducts()
    {
        return $this->belongsToMany(User::class);
    }
}