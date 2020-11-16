<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class adminController extends Controller
{
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

        $data = DB::table('categories')->get();
        return view ('backend.categories.editcategory',['data'=>$data,'singledata'=> $singledata]);
    }

    public function viewtable(){
        return view ('backend.viewtable');
    }

    public function menu(){
        return view ('backend.menu');
    }

    public function addpost(){
        return view ('backend.addpost');
    }
}
