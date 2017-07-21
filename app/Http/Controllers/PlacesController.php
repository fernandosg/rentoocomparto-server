<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class PlacesController extends Controller {

  const MODEL = "App\Place";
  const ADDRESS_MODEL="App\Address";
  use RESTActions;
  public function __construct(){
    $this->middleware('CORS');
    $this->middleware("auth",["only"=>[
      "add",
      "put",
      "remove"
    ]]);
  }

    public function create(Request $request){
      $m = self::MODEL;
      $m_address=self::ADDRESS_MODEL;
      $address=$m_address::create($request->input("address"));
      $param=$request->input("place");
      $place=$m::create(["title"=>$param["title"],
        "description"=>$param["description"],
        "price"=>$param["price"],
        "city_id"=>$param["city_id"],
        "type_id"=>$param["type_id"],
        "offer_id"=>$param["offer_id"],
        "user_id"=>$param["user_id"],
        "address_id"=>$address->id]);
        //echo "prueba";
      return $this->respond(Response::HTTP_CREATED, $place);
    }

    /*
    Getting the latest N places.
    */
    public function latest(Request $request, $count)
    {
      $m=self::MODEL;
      $places=$m::take($count)->with(["type","city","offer","address"])->get();
      return response()->json($places);
    }

    /*
    Getting all the places by the city_id
    */
    public function by_city(Request $request, $city_id){
      $m = self::MODEL;
      $places=$m::where("city_id",$city_id)->with(["type","city","offer","address"])->get();
      return response()->json($places);
    }

    /*
    Getting all the places that have some characteristic.
    For now, receive the city_id and the price. Should be, maybe, have two prices like interval.
    */
    public function by_characteristic(Request $request){
      $m = self::MODEL;
      $places=$m::where("city_id",$request->input("city_id"))->where("price",">=",$request->input("min_price"))->where("price","<=",$request->input("max_price"))->where("type_id",$request->input("type_id"))->with(["type","city","offer","address"])->get();
      return response()->json($places);
    }

  }
