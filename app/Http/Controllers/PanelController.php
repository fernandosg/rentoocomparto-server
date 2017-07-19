<?php
  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use Illuminate\Http\Response;
  class PanelController extends Controller
  {
    const MODEL_USER = "App\User";
    public function __construct(){
      $this->middleware("auth",["only"=>[
          "logout"
      ]]);
      $this->middleware("CORS",["only"=>[
        "signup_fb",
        "signup"
      ]]);
    }

    public function index(){

    }

    public function logout(Request $request){
      $m=self::MODEL_USER;
      $user=$m::where("email",$request->header("email"))->where("token",$request->header("token"))->first();
      if(is_null($user)==false){
        $user->token="";
        $user->save();
        return response()->json(null);
      }
      return response()->json(null,401);
    }

    public function login(Request $request){
      $m=self::MODEL_USER;
      $user=$m::where("email",$request->input("email"))->where("password",$request->input("password"))->first();
      if(is_null($user)){
        $response_fail=(object) null;
        $response_fail->message="Error";
        return response()->json($response_fail,404);
      }else{
        $user->token=password_hash($request->input("password"), PASSWORD_DEFAULT);
        $user->save();
        if($user->range===2){
          $returning=(object)null;
          $returning->email=$user->email;
          $returning->token=$user->token;
          $returning->api_token=env("API_TOKEN","");
          return response()->json($returning,200);
        }else
          return response()->json($user,200);
      }
    }

    /*
      Sign up endpoint with email and password
    */
    public function signup(Request $request){
      $m=self::MODEL_USER;
      $request->range=1;
      $this->validate($request,$m::$rules);
      return response()->json($m::create($request->all()),Response::HTTP_CREATED);
    }

    /*
      Sign up endpoint with facebook
    */
    public function signup_fb(Request $request){
      $m=self::MODEL_USER;
      $blank=[];
      $user=$m::where("email",$request->email)->where("fb_id",$request->fb_id)->first();
      if(is_null($user)){
        $blank["password"]=bin2hex(openssl_random_pseudo_bytes(8));
        $blank["range"]=1;
        $blank["email"]=$request->email;
        $blank["token"]=password_hash($blank["password"], PASSWORD_DEFAULT);
        $blank["fb_id"]=$request->fb_id;
        $blank["name"]=$request->name;
        $this->validate($request,$m::$rules);
        return response()->json($m::create($blank),Response::HTTP_CREATED);
      }else{
        $user->token=password_hash($user->password, PASSWORD_DEFAULT);
        $user->save();
        return response()->json($user,200);
      }
    }

  }
