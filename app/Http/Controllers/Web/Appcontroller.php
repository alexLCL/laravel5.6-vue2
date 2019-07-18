<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Appcontroller extends Controller
{

    /**
     * Notes: app页面
     * User: Administrator
     * Date: 2019/7/18
     * Time: 17:57
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function getApp(){
        return view('app');
    }

}
