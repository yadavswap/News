<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class frontendController extends Controller
{
    public function __construct(){
        $categories = DB::table('categories')->where('status' ,'on')->get();
        $setting = DB::table('settings')->first();
        $pages = DB::table('pages')->where('status' ,'publish')->get();

        if($setting){
            $setting->social = explode(',',$setting->social);
            foreach($setting->social as $social){
                $icon = explode('.',$social);
                // $data[$parts[0]] = isset($parts[1]) ? $parts[1] : null;
                $lastnews = DB::table('posts')->where('status','publish')->orderby('pid','DESC')->first();

            } 
        }
      
        view()->share([
            'categories' => $categories,
            'setting' => $setting,
            'lastnews'=>$lastnews,
            'pages'=>$pages,
             ]);

        // return view('frontend.layout.master', compact('categories'));
 }



    public function index(){

        $featured = DB::table('posts')->where('category_id' ,'LIKE','%22%')->orderby('pid','DESC')->get();
        $general = DB::table('posts')->where('category_id' ,'LIKE','%24%')->orderby('pid','DESC')->get();
        $business = DB::table('posts')->where('category_id' ,'LIKE','%20%')->orderby('pid','DESC')->get();
        $tech = DB::table('posts')->where('category_id' ,'LIKE','%25%')->orderby('pid','DESC')->get();
        $sport = DB::table('posts')->where('category_id' ,'LIKE','%26%')->orderby('pid','DESC')->get();
        $health = DB::table('posts')->where('category_id' ,'LIKE','%23%')->orderby('pid','DESC')->get();
        $travel = DB::table('posts')->where('category_id' ,'LIKE','%28%')->orderby('pid','DESC')->get();
        $enter = DB::table('posts')->where('category_id' ,'LIKE','%27%')->orderby('pid','DESC')->get();
        $edu = DB::table('posts')->where('category_id' ,'LIKE','%15%')->orderby('pid','DESC')->get();
        $pol = DB::table('posts')->where('category_id' ,'LIKE','%29%')->orderby('pid','DESC')->get();
        $style = DB::table('posts')->where('category_id' ,'LIKE','%30%')->orderby('pid','DESC')->get();
        $new = DB::table('posts')->where('category_id' ,'LIKE','%32%')->orderby('pid','DESC')->get();





        return view('frontend.index',['featured'=>$featured,'general'=>$general,'business'=>$business,'tech'=>$tech,'sport'=>$sport,'health'=>$health,'travel'=>$travel,'enter'=>$enter,'edu'=>$edu
        ,'pol'=>$pol,'style'=>$style,'new'=>$new]);
    }

    public function category($slug){
        $cat = DB::table('categories')->where('slug',$slug)->first();
        $posts = DB::table('posts')->where('category_id','LIKE','%'.$cat->cid.'%')->get();
        // $releated = DB::table('posts')->where('category_id','LIKE','%'.$data->category_id.'%')->get();

        $latest = DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();

        return view('frontend.category',['posts'=>$posts,'cat'=>$cat,'latest'=>$latest]);
    }

    public function article($slug){
        $data = DB::table('posts')->where('slug',$slug)->first();
        $views = $data->views;
        DB::table('posts')->where('slug',$slug)->update(['views'=>$views + 1]);
        $category = explode(',',$data->category_id);
        $category = $category[0];
        $releated = DB::table('posts')->where('category_id','LIKE','%'.$data->category_id.'%')->get();
        $latest = DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();

        return view('frontend.article',['data'=>$data,'releated'=>$releated,'latest'=>$latest]);
    }
    public function page($slug){
        $data = DB::table('pages')->where('slug',$slug)->first();
        // $releated = DB::table('posts')->where('category_id','LIKE','%'.$data->category_id.'%')->get();
        $latest = DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();

        return view('backend.pages.page',['data'=>$data,'latest'=>$latest]);

    }
    public function contact(){
        // $data = DB::table('pages')->where('slug',$slug)->first();
        // // $releated = DB::table('posts')->where('category_id','LIKE','%'.$data->category_id.'%')->get();
        $latest = DB::table('posts')->where('status','publish')->orderby('pid','DESC')->get();

        return view('frontend.contact',['latest'=>$latest]);

    }

    public function searchContent(){
        $url = "http://localhost/news/article";
        $text = $_GET;
        $data = DB::table('posts')->where('title','LIKE','%'.$text.'%')->orwhere('description','LIKE','%'.$text.'%')->get();
        $output = '';
        echo '<ul class="search-result">';
        if(count($data ) > 0){
            foreach($data as $d){

            
                echo '<li><a href="' .$url. '/'.$d->slug.'">'.$d->title.'</a></li>';

        }
    }else{
        echo '<li><a >Sorry ! No Data Found</a></li>';


    }echo '</ul>';
    return $output;
}
}