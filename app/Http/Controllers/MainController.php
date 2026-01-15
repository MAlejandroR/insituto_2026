<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index() {
      $num = rand(1,100);
      $nombre = "juan";
      return view("main", ["num" => $num, "nombre" => $nombre]);
    }
}
