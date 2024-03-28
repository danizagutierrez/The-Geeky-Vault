<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index (){
        $viewData = [];
        $viewData["title"] = "Admin Page - CSIS 3280 Online Store Demo";

        return view('admin.home.index')->with("viewData", $viewData);
    }
}
