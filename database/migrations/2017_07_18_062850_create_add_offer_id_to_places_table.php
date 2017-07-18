<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddOfferIdToPlacesTable extends Migration
{

    public function up()
    {
      Schema::table('places', function($table) {
          $table->integer('offer_id')->unsigned();
          $table->foreign('offer_id')
              ->references('id')
              ->on('offers');
      });
    }

    public function down()
    {
      Schema::table('places', function($table) {
          $table->dropColumn('offer_id');
      });
    }
}
