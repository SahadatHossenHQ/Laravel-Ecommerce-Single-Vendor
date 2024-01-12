<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;
      protected $guarded = ['id'];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

        /**
     * The has Many Relationship
     *
     * @var array
     */
    public function reply()
    {
        return $this->belongsTo(BlogComment::class, 'parent_id');
    }
}
