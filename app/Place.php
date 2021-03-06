<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {

    protected $fillable = ["title", "description", "user_id","city_id","type_id","price","offer_id", "address_id", "path"];

    protected $dates = [];

    public static $rules = [
        "title" => "required",
        "description" => "required",
        "user_id" => "unsigned",
        "user_id" => "required|numeric",
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function type()
    {
      return $this->belongsTo("App\Type");
    }

    public function offer()
    {
      return $this->belongsTo("App\Offer");
    }

    public function city()
    {
      return $this->belongsTo("App\City");
    }

    public function address()
    {
      return $this->belongsTo("App\Address");
    }

}
