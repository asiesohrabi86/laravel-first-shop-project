<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;

class Order extends Model
{
    protected $fillable=[
        'price',
        'status',
        'tracking_serial'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
