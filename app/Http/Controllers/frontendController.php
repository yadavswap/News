<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function category(){
        return view('frontend.category');
    }

    public function article(){
        return view('frontend.article');
    }
}
