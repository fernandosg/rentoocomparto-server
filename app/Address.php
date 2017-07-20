<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $fillable = ["street", "suburb", "number", "city_id"];

    protected $dates = [];

    public static $rules = [
        "street" => "required",
        "suburb" => "required",
        "number" => "required",
        "city_id" => "required|numeric",
    ];

    public $timestamps = false;

    public function city()
    {
        return $this->belongsTo("App\City");
    }


}
