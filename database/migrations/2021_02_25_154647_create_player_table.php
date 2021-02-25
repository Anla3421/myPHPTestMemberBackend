<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTable extends Migration
{
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {

		$table->increments('id')->unsigned();
		$table->integer('provider_id',)->unsigned();
		$table->string('name',64);
		$table->string('uniq_id',64);
		// $table->timestamp('last_at');
        $table->timestamps();
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('player');
    }
}