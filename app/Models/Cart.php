<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;

    protected $fillable = ['product_id'];

    public static function validate($request)
    {
        $request->validate([
            "user_id" => "",
            "product_id" => "",
            "order_qty" => "",
            "total_amount" => "",
        ]);
    }


    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($product_id)
    {
        $this->attributes['product_id'] = $product_id;
    }

    public function getOrderQty()
    {
        return $this->attributes['order_qty'];
    }

    public function setOrderQty($order_qty)
    {
        $this->attributes['order_qty'] = $order_qty;
    }

    public function getTotalAmount()
    {
        return $this->attributes['total_amount'];
    }

    public function setTotalAmount($total_amount)
    {
        $this->attributes['total_amount'] = $total_amount;
    }





}
