<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    public static function validate($request)
    {
        $request->validate([
            "product_id" => "",
            "order_qty" => "",
            "total_amount" => "",
        ]);
    }
}
