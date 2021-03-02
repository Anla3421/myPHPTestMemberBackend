<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTable extends Migration
{
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {

		$table->increments('id')->unsigned();
		$table->integer('gid')->unique()->unsigned();
		$table->integer('info_id')->unsigned();
		$table->integer('provider_id')->unsigned();
		$table->tinyInteger('status');
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
        // $table->timestamps(0);
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('game');
    }
}