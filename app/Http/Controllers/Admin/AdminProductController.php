<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - The Geeky Vault";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Product::validate($request);

        $newProduct = new Product();
        $newProduct->setName($request->input('product_name'));
        $newProduct->setDescription($request->input('product_description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setRating($request->input('rating'));
        $newProduct->setQtyInstock($request->input('qty_instock'));
        $newProduct->setImage("game.png");
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return back();
    }

    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Product - The Geeky Vault";
        $viewData["product"] = Product::findOrFail($id);
        return view('admin.product.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Product::validate($request);

        $product = Product::findOrFail($id);
        $product->setName($request->input('product_name'));
        $product->setDescription($request->input('product_description'));
        $product->setPrice($request->input('price'));
        $product->setRating($request->input('rating'));
        $product->setQtyInstock($request->input('qty_instock'));

        if ($request->hasFile('image')) {
            $imageName = $product->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }

        $product->save();
        return redirect()->route('admin.product.index');
    }
}
