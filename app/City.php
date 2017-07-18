<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    protected $fillable = ["name", "state_id"];

    protected $dates = [];

    public static $rules = [
        "name" => "required",
        "state_id" => "required|numeric",
    ];

    public $timestamps = false;

    public function state()
    {
        return $this->belongsTo("App\State");
    }


}
