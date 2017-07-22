<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddPathToPlaceTable extends Migration
{

    public function up()
    {
      Schema::table("places",function($table){
        $table->string("path")->nullable();
      });
    }

    public function down()
    {
      Schema::table("places",function($table){
        $table->dropColumn("path");
      });
    }
}
