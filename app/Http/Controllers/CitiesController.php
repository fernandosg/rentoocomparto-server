<?php namespace App\Http\Controllers;

class CitiesController extends Controller {

    const MODEL = "App\City";

    use RESTActions;
    public function __construct(){
      $this->middleware('CORS');      
      $this->middleware("auth",["only"=>[
        "add",
        "put",
        "remove"
      ]]);
    }
}
