<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

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

        return response()->json(['success' => true, 'message' => 'Product added to cart successfully']);
        
    }


    public function delete($id)
    {
        Cart::destroy($id);
        return back();
    }

    
    public function checkout(){
        $user = auth()->user();
    
        // Create a new order
        $order = new Order();
        $order->user()->associate($user);
        $order->save();
    
        // Retrieve cart items
        $cartItems = $user->cart()->get();
    
        // Transfer cart items to order items
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order()->associate($order);
            $orderItem->product()->associate($cartItem->product);
            $orderItem->quantity = $cartItem->order_qty;
            $orderItem->save();
            
            // Optionally, you may want to delete cart items here
            $cartItem->delete();
        }

        $title = "The Geeky Vault";
        $subtitle = "Your order is ready!";

    
        return view('user.checkout', compact('order', 'title', 'subtitle'));
    }


    public function order($id, $oid){
        $viewData = [];
        $viewData["title"] = "The Geeky Vault";
        $viewData["subtitle"] = "Your order";
        $order = Order::where('user_id', $id)
                  ->where('id', $oid)
                  ->first();
        $viewData["order"] = $order;
        return view ('user.order')->with("viewData", $viewData);
    }
    
}
