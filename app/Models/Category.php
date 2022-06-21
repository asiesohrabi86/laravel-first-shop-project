<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use Sluggable;
    
    protected $fillable=[
        'name',
        'slug',
        'category_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug'=>['source'=>'']
        ];
    }

    public function parent()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function getParentName()
    {
        return is_null($this->parent) ? 'ندارد' : $this->parent->name;
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
