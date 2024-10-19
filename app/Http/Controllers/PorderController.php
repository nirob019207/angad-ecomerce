<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PorderController extends Controller
{
    public function porder(){
        $orders=DB::table('porders')->get();
        return view('backend.porder', ['orders' => $orders]);
    }
}
