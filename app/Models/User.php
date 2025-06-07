<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Direction;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Get the customer info associated with the user.
     */
    public function customer_info()
    {
        return $this->hasOne(CustomerInfo::class);
    }
     /**
     * Get the shop info associated with the user.
     */
    public function shop_info()
    {
        return $this->hasOne(ShopInfo::class);
    }

    /**
     * Get the vendor account for the user.
     */
    public function vendorAccount()
    {
        return $this->hasOne(VendorAccount::class, 'vendor_id');
    }

    /**
     * Get the products for the user.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the orders for the user.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
    /**
     * Get all of the coupons that are assigned this user.
     */
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }


    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the reviews for the user.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function downloadUserProducts()
    {
        return $this->hasMany(Product::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }
     /**
     * Get the chats for the user.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    /**
     * Get the chats for the user.
     */
    public function staff_chats()
    {
        return $this->hasMany(Chat::class, 'staff_id', 'id');
    }
}
