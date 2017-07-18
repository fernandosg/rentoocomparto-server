<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

    protected $fillable = ["name"];

    protected $dates = [];

    public static $rules = [
        "name" => "required",
    ];

    public $timestamps = false;

    // Relationships

}
