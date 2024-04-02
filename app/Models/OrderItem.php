<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $fillable = ['order_id', 'product_id', 'order_qty', 'total_amount'];
    
    public static function validate($request)
    {
        $request->validate([
            "order_id" =>"",
            "product_id" => "",
            "order_qty" => "",
            "total_amount" => "",
        ]);
    }
}
