<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class crudController extends Controller
{
    //

    public function insertdata(){
        $data = Input::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H:i:s');
        DB::table($tbl)->insert($data);
        session::flash('message','Data Inserted Successfully');
        return redirect()->back();
        print_r($data);

    }

    public function updatedata(){
        $data = Input::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        DB::table($tbl)->where(key($data),reset($data))->update($data);
        session::flash('message','Data Updated Successfully');
        return redirect()->back();
        print_r($data);

    }
}