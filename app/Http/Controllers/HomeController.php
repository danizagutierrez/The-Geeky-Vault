<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $viewData = [];
    $viewData["title"] = "Home Page - The Geeky Vault";
    return view('home.index')->with("viewData", $viewData);
  }

  public function about()
  {
    $viewData = [];
    $viewData["title"] = "About us - The Geeky Vault";
    $viewData["subtitle"] =  "About us - The Geeky Vault";
    $viewData["description"] =  "This is an about page for the The Geeky Vault Project. This project is for the CSIS3280 course at Douglas College.";
    $viewData["author"] = "Developed by: Daniza, Arthur, Moises";
    return view('home.about')->with("viewData", $viewData);
    
  }
}

?>