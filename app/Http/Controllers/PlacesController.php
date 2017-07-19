<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class PlacesController extends Controller {

    const MODEL = "App\Place";

    use RESTActions;
    public function __construct(){
      $this->middleware('CORS');
      $this->middleware("auth",["only"=>[
        "add",
        "put",
        "remove"
      ]]);
    }
    /*
      Getting the latest N places.
    */
    public function latest(Request $request, $count)
    {
      $m=self::MODEL;
      $places=$m::take($count)->with(["type","city","offer"])->get();
      return response()->json($places);
    }

    /*
      Getting all the places by the city_id
    */
    public function by_city(Request $request, $city_id){
      $m = self::MODEL;
      $places=$m::where("city_id",$city_id)->with(["type","city","offer"])->get();
      return response()->json($places);
    }

    /*
      Getting all the places that have some characteristic.
      For now, receive the city_id and the price. Should be, maybe, have two prices like interval.
    */
    public function by_characteristic(Request $request){
      $m = self::MODEL;
      $places=$m::where("city_id",$request->input("city_id"))->where("price",">=",$request->input("price"))->with(["type","city","offer"])->get();
      return response()->json($places);
    }

}
