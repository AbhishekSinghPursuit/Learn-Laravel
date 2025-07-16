<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    // create by command: php artisan make:controller DemoController
    public function index(){
        return view('home');
    }

    public function about(){
        return view('about');
    }
}
