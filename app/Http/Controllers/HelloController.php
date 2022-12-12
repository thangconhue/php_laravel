<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        echo "<h1>hello controller</h1>";
    }
    public function hello($bien1,$bien2){
        echo "<h1>$bien1 $bien2</h1>";
    }
}
