<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    // use HasFactory;

    public static function validate($request)
    {
        $request->validate([
            "order_date" => "",
            "order_status" => "",
            "total_amount" => "",
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

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

}
