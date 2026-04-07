<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Comment;
use App\Models\User;


class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'image',
        'description',
        'brand_name',
        'status', 
        'categories',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function isLikedBy(User $user)
    {
    return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function purchase()
    {
    return $this->hasOne(Purchase::class);
    }

}
