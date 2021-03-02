<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerSaveTable extends Migration
{
    public function up()
    {
        Schema::create('player_save', function (Blueprint $table) {

		$table->integer('gid');
		$table->string('token',50);
		$table->string('name',20);
		$table->string('profile',10);
		$table->string('value',300)->nullable()->default('NULL');
		$table->timestamp('updated_at');
        $table->primary(['gid','token','name','profile']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('player_save');
    }
}
