<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddAddressIdToPlaceTable extends Migration
{

    public function up()
    {
        Schema::table("places",function($table){
          $table->integer("address_id")->unsigned();
          $table->foreign("address_id")->references("id")->on("addresses");
        });
    }

    public function down()
    {
        Schema::table("places",function($table){
          $table->dropColumn("address_id");
        });
    }
}
