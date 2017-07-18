<?php namespace App\Http\Controllers;

class OffersController extends Controller {

    const MODEL = "App\Offer";

    use RESTActions;
    public function __construct(){
      $this->middleware("auth",["only"=>[
        "add",
        "put",
        "remove"
      ]]);
    }
}
