<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        $viewData = [];
        $viewData["title"] = "Home Page - CSIS 3280 Online Store Demo";
        return view('home.index')->with('viewData',$viewData);
    }

    public function about(){
        $viewData = [];
        $viewData['title'] = 'About Us - CSIS 3280 Online Store Demo';
        $viewData['subtitle'] = 'About Us';
        $viewData['description'] = 'This is the about page of our online store';
        $viewData['author'] = 'Bambang Sarif';

        return view('home.about')->with('viewData',$viewData);
    }
}
