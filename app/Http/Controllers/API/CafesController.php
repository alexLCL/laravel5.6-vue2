<?php

namespace App\Http\Controllers\API;

use App\Models\Cafe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CafesController extends Controller
{

    /**
     * Notes:
     * User: Administrator
     * Date: 2019/7/19
     * Time: 15:21
     */
    public function getCafes(){
        $cafes = Cafe::all();
        return response()->json($cafes);
    }

    /**
     * Notes:
     * User: Administrator
     * Date: 2019/7/19
     * Time: 15:21
     * @param $id
     */
    public function getCafe($id){
        $cafe = Cafe::where('id','=',$id)->findOrFail();
        return response()->json($cafe);
    }

    /**
     * Notes:
     * User: Administrator
     * Date: 2019/7/19
     * Time: 15:21
     */
    public function postNewCafe(Request $request){
        $cafe = new Cafe();

        $cafe->name = $request->name;
        $cafe->address = $request->address;
        $cafe->city = $request->city;
        $cafe->state = $request->state;
        $cafe->zip = $request->zip;

        $cafe->save();

        return response()->json($cafe,201);
    }

}
