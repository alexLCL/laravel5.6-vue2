<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/22
 * Time: 12:06
 */

namespace App\Utilities;


use GuzzleHttp\Client;

class BaiduMap
{


    public static function geocodeAddress($address,$city,$state){
        $result=array();


        $address = urlencode($state.$city.$address);
        $apiKey=config('services.baidu_map.map_api_key');
        $url='http://api.map.baidu.com/geocoding/v3/?address='.$address.'&output=json&ak='.$apiKey;

        $client = new Client();

        $geocodeResponse=$client->get($url)->getBody();
        $getData=\GuzzleHttp\json_decode($geocodeResponse);
        $result['lng']=$getData->result->location->lng;
        $result['lat']=$getData->result->location->lat;

        return $result;



    }
}