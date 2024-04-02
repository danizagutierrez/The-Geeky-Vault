<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    protected $fillable = ['user_id', 'order_date', 'order_status', 'total_amount']; // Allow mass assignment for these fields

    public static function validate($request)
    {
        $request->validate([
            "user_id" => "required",
            "order_date" => "required",
            "order_status" => "required",
            "total_amount" => "required|numeric",
        ]);
    }

    public function getOrderDate()
    {
        return $this->attributes['order_date'];
    }

    public function getOrderStatus()
    {
        return $this->attributes['order_status'];
    }

    public function setOrderStatus($order_status)
    {
        $this->attributes['order_status'] = $order_status;
    }

    public function getTotalAmount()
    {
        return $this->attributes['total_amount'];
    }
}
