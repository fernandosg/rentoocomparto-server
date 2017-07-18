<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddPriceToPlacesTable extends Migration
{

    public function up()
    {
      Schema::table('places', function($table) {
          $table->decimal('price',5,2);
      });
    }

    public function down()
    {
      Schema::table('places', function($table) {
          $table->dropColumn('price');
      });
    }
}
