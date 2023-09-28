<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=
    ['id','cust_id','bill','fullname','address','phone','status'];

    public function user(){
        return $this->belongsTo(User::class, 'cust_id');
        
    }

    public function orderItems()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}

