<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class PlacesController extends Controller {

    const MODEL = "App\Place";

    use RESTActions;

    /*
      Getting all the places by the city_id
    */
    public function by_city(Request $request, $city_id){
      $m = self::MODEL;
      $places=$m::where("city_id",$city_id)->get();
      return $places;
    }

    /*
      Getting all the places that have some characteristic.
      For now, receive the city_id and the price. Should be, maybe, have two prices like interval.
    */
    public function by_characteristic(Request $request){
      $m = self::MODEL;
      $places=$m::where("city_id",$request->input("city_id"))->where("price",">=",$request->input("price"))->get();
      echo $places;
    }

}
