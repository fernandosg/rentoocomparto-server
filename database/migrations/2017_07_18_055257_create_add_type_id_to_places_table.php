<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddTypeIdToPlacesTable extends Migration
{

    public function up()
    {
      Schema::table('places', function($table) {
          $table->integer('type_id')->unsigned();
          $table->foreign('type_id')
              ->references('id')
              ->on('types');
      });
    }

    public function down()
    {
      Schema::table('places', function($table) {
          $table->dropColumn('type_id');
      });
    }
}
