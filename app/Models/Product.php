<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['description'] - string - contains the product description
     * $this->attributes['image'] - string - contains the product image
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['created_at'] - timestamp - contains the product creation date
     * $this->attributes['updated_at'] - timestamp - contains the product update date
     */

class Product extends Model
{
    //use HasFactory;  

    public static function validate($request)
    {
        $request->validate([
            "product_name" => "required|max:255",
            "product_description" => "required",
            "image"=> "required",
            "price" => "required|numeric|gt:0",
            'qty_instock' => 'required|numeric|gte:0',
            'rating' => 'required|numeric|gte:0'
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['product_name'];
    }

    public function setName($name)
    {
        $this->attributes['product_name'] = $name;
    }

    public function getDescription()
    {
        return $this->attributes['product_description'];
    }

    public function setDescription($description)
    {
        $this->attributes['product_description'] = $description;
    }
    public function getImage()
    {
        return $this->attributes['image'];
    }
    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getQtyInstock()
    {
        return $this->attributes['qty_instock'];
    }

    public function setQtyInstock($qty)
    {
        $this->attributes['qty_instock'] = $qty;
    }

    public function getRating()
    {
        return $this->attributes['rating'];
    }
    public function setRating($rating)
    {
        $this->attributes['rating'] = $rating;
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
