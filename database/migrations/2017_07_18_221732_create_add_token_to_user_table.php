<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddTokenToUserTable extends Migration
{

    public function up()
    {
      Schema::table('users', function($table) {
          $table->string('token');
      });
    }

    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('token');
        });
    }
}
