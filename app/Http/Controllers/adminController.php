<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;class adminController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function adminindex(){
        return view ('backend.adminindex');
    }

    public function category(){
        $data = DB::table('categories')->get();
        return view ('backend.categories.category',['data'=>$data]);
    }
    public function editcategory($id){
        $singledata = DB::table('categories')->where('cid',$id)->first();
        if($singledata == NULL){
            return redirect('viewcategory');
        }
        // $categories = DB::table('categories')->get();

        $data = DB::table('categories')->get();
        return view ('backend.categories.editcategory',['data'=>$data,'singledata'=> $singledata]);
    }

    public function multipledelete(){
        $data = Input::except('_token');
        if($data['bulk-action' ] == 0){
            session::flash('message','please select the action you want to perform');
            return redirect()->back();
        }
        $tbl = decrypt($data['tbl']);
        $tblid = decrypt($data['tblid']);
        if(empty($data['select-data'])){
            session::flash('message','please select the data you want to perform');
            return redirect()->back();
        }

        $ids = $data['select-data'];
        foreach($ids as $id){
            DB::table($tbl)->where($tblid,$id)->delete();
            
        }
        session::flash('message','Delete Sucessfully');
        return redirect()->back();
    }
    public function viewtable(){
        return view ('backend.viewtable');
    }

    public function settings(){
        $data = DB::table('settings')->first();
        if($data){
            $data->social = explode(',',$data->social);
        }
        // print_r($data);
        // exit();

        return view ('backend.settings',['data'=>$data]);
     
        // echo count($data);
        // exit();
    }

  

    public function addpost(){
        $categories = DB::table('categories')->get();

        return view ('backend.posts.addpost',['categories'=>$categories]);
    }

    public function allposts(){
        $posts = DB::table('posts')->orderby('pid','DESC')->paginate(20);
        foreach($posts as $post){
            $categories = explode(',',$post->category_id);
            foreach($categories as $cat){
                $postcat = DB::table('categories')->where('cid',$cat)->value('title');
                $postcategory[]= $postcat;
                $postcat= implode(', ',$postcategory);


            }
            $post->category_id = $postcat;
            $postcategory = [];

        }
        $published = DB::table('posts')->where('status','publish')->count();
        $allpost = DB::table('posts')->count();

        return view ('backend.posts.allposts',['posts'=>$posts,'published'=>$published,'allpost'=>$allpost]);
    }
    public function editposts($id){
        $data = DB::table('posts')->where('pid',$id)->first();
        $categories = DB::table('categories')->get();

        $postcat = explode(',',$data->category_id);
        return view ('backend.posts.editposts',['data'=>$data,'categories'=> $categories,'postcat'=>$postcat]);
    }
    // page
    
    public function addpage(){

        return view ('backend.pages.addpage');
    }

    public function allpages(){
        $pages = DB::table('pages')->get();
       
        $published = DB::table('pages')->where('status','publish')->count();
        $allpages = DB::table('pages')->count();

        return view ('backend.pages.allpages',['pages'=>$pages,'published'=>$published,'allpages'=>$allpages]);
    }
    public function editpages($id){
        $data = DB::table('pages')->where('pageid',$id)->first();

        return view ('backend.pages.editpages',['data'=>$data]);
    }

    public function addads(){

        return view ('backend.ads.addads');
    }
    
    public function allads(){
        $data = DB::table('ads')->orderby('aid','DESC')->get();

        return view ('backend.ads.allads',['data'=>$data]);
    }
    public function editads($id){
        $data = DB::table('ads')->where('aid',$id)->first();

        return view ('backend.ads.editads',['data'=>$data]);
    }
}

