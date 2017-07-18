<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model {

    protected $fillable = ["title", "description", "user_id"];

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


}
