<?php namespace App\Http\Controllers;

class TypesController extends Controller {

    const MODEL = "App\Type";

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
