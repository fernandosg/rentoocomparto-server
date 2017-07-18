<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddCityToPlacesTable extends Migration
{

    public function up()
    {
        Schema::table('places', function($table) {
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
        });
    }

    public function down()
    {
      Schema::table('places', function($table) {
          $table->dropColumn('city_id');
      });
    }
}
