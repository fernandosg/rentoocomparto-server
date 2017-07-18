<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{

    public function up()
    {
        Schema::create('offers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // Constraints declaration

        });
    }

    public function down()
    {
        Schema::drop('offers');
    }
}
