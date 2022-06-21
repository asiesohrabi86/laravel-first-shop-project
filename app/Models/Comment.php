<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Comment extends Model
{
    protected $fillable=[
        'user_id',
        'commentable_id',
        'commentable_type',
        'approved',
        'comment',
        'parent_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function child()
    {
        return $this->hasMany(Comment::class , 'parent_id' , 'id');
    }
}
