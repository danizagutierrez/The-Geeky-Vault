<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{


    public function cart(){

        $viewData = [];
        $viewData["title"] = "Admin Page - Products - The Geeky Vault";
        $viewData["subtitle"] = "Geeky Vault - Products";
        $viewData["products"] = Product::all();
        return view('user.cart')->with("viewData", $viewData);
    }
}
