<?php

namespace App\Models\frontend;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable;

    protected $fillable=[
        'title',
        'slug',
        'description',
        'price',
        'image'
    ];

    public function sluggable(): array
    {
        return [
            'slug'=>['source' =>'']                  
        ];
    }
}
