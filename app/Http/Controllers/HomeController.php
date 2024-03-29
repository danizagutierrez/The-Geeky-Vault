<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $viewData = [];
    $viewData["title"] = "Home Page - CSIS 3560 Online Store Demo";
    return view('home.index')->with("viewData", $viewData);
  }

  public function about()
  {
    $viewData = [];
    $viewData["title"] = "About us - CSIS 3560 Online Store Demo";
    $viewData["subtitle"] =  "About us";
    $viewData["description"] =  "This is an about page for the CSIS 3560 Online Store Demo";
    $viewData["author"] = "Developed by: Bambang Sarif";
    return view('home.about')->with("viewData", $viewData);
    
  }
}

?>