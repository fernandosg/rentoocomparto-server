<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddRangeToUserTable extends Migration
{

    public function up()
    {
      Schema::table('users', function($table) {
          $table->integer('range')->default(1);
      });
    }

    public function down()
    {
      Schema::table('users', function($table) {
          $table->dropColumn('range');
      });
    }
}
