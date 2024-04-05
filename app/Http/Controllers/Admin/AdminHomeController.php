<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Admin - The Geeky Vault";
        $viewData["users"] = User::all();
        return view('admin.home.index')->with("viewData", $viewData);
    }
    public function delete($id)
    {
        User::destroy($id);
        return back();
    }
    
    public function promote($id)
    {      
        $user = User::findOrFail($id);
        $user->role = 'admin';    
        $user->save();
        return redirect()->route('admin.home.index');
    }
}
