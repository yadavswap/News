<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;class adminController extends Controller
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
        if($singledata == NULL){
            return redirect('viewcategory');
        }

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

        return view ('backend.settings',['data'=>$data]);
        // echo count($data);
        // exit();
    }

  

    public function addpost(){
        return view ('backend.addpost');
    }
}
