<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{


    public function cart(){

        $viewData = [];
        $viewData["title"] = "Admin Page - Products - CSIS3280 Online Store";
        $viewData["subtitle"] = "This is a test";
        $viewData["products"] = Product::all();
        return view('user.cart')->with("viewData", $viewData);
    }
}
