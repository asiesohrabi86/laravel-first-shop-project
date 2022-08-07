<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;

class Product extends Model
{
   
    use sluggable;
    
    protected $fillable=[
        'title',
        'slug',
        'description',
        'price',
        'image',
        'inventory'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable():array
    {
        return[
            'slug'=>['source'=>'']
        ];
    }

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }


    public function comment()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }
}
