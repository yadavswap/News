<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class frontendController extends Controller
{
    public function __construct(){
        $categories = DB::table('categories')->where('status' ,'on')->get();
        $setting = DB::table('settings')->first();
        if($setting){
            $setting->social = explode(',',$setting->social);
            foreach($setting->social as $social){
                $icon = explode('.',$social);
                // $data[$parts[0]] = isset($parts[1]) ? $parts[1] : null;

            } 
        }
      
        view()->share([
            'categories' => $categories,
            'setting' => $setting,
             ]);

        // return view('frontend.layout.master', compact('categories'));
 }



    public function index(){

        $featured = DB::table('posts')->where('category_id' ,'LIKE','%14%')->orderby('pid','DESC')->get();
        return view('frontend.index',['featured'=>$featured]);
    }

    public function category(){
        return view('frontend.category');
    }

    public function article(){
        return view('frontend.article');
    }

}
