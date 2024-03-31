<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;
use App\Models\Cart;

class UserController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart(){

        $viewData = [];
        $viewData["title"] = "The Geeky Vault";
        $viewData["subtitle"] = "Your cart!";
        $viewData["cart"] = auth()->user()->cart()->get(); // Retrieve the user's cart items
        return view('user.cart')->with("viewData", $viewData);
    }

    public function addToCart(Product $product){

        // Get the authenticated user
            $user = auth()->user();

        // Create a new cart entry for the authenticated user
            $user->cart()->create([
                'user_id' => $user->id,
                'product_id' => $product->id
            ]);
        //return redirect()->back()->with('success', 'Product added to cart successfully.');
        return response()->json(['success' => true, 'message' => 'Product added to cart successfully']);
        
    }


    public function delete($id)
    {
        Cart::destroy($id);
        return back();
    }

    public function checkout(){



    }
}
