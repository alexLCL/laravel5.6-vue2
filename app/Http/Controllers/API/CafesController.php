<?php

namespace App\Http\Controllers\API;

use App\Models\Cafe;
use App\Utilities\BaiduMap;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCafeRequest;

class CafesController extends Controller
{

    /**
     * Notes:
     * User: Administrator
     * Date: 2019/7/19
     * Time: 15:21
     */
    public function getCafes(){
        $cafes = Cafe::with('brewMethods')->get();
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
        $cafe = Cafe::where('id','=',$id)->with('brewMethods')->first();
        return response()->json($cafe);
    }

    /**
     * Notes:
     * User: Administrator
     * Date: 2019/7/19
     * Time: 15:21
     */
    public function postNewCafe(StoreCafeRequest $request){
        $cafe = new Cafe();

        $cafe->name     = $request->input('name');
        $cafe->address  = $request->input('address');
        $cafe->city     = $request->input('city');
        $cafe->state    = $request->input('state');
        $cafe->zip      = $request->input('zip');

        $coordinates = BaiduMap::geocodeAddress($cafe->address,$cafe->city,$cafe->state);
        $cafe->latitude = $coordinates['lat'];
        $cafe->longitude=$coordinates['lng'];

        $cafe->save();

        return response()->json($cafe,201);
    }

}
