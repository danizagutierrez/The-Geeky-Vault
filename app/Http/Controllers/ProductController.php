<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index(){

        $viewData = [];
        $viewData["title"] = 'Products - CSIS 3280 Online Store Demo';
        $viewData["subtitle"] = 'List of Products - CSIS 3280 Online Store Demo';

        //tHIS FUNCTION DOES NOT NEED TO BE CREATED ITS AUTOMATIC
        $viewData['products'] =  Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show($id){

        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName() . "CSIS 3280 Online Store Demo";
        $viewData["subtitle"] = $product->getName() . "CSIS 3280 Online Store Demo";
        $viewData["product"] = $product;

        return view('product.show')->with("viewData", $viewData);

    }
}
