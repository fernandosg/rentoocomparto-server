<?php namespace App\Http\Controllers;

class StatesController extends Controller {

    const MODEL = "App\State";

    use RESTActions;
    public function __construct(){
      $this->middleware("auth",["only"=>[
        "add",
        "put",
        "remove"
      ]]);
    }

}
