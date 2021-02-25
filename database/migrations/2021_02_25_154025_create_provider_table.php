<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderTable extends Migration
{
    public function up()
    {
        Schema::create('provider', function (Blueprint $table) {

		$table->increments('id')->unsigned();
		$table->string('username',20);
		$table->string('private_key',64);
		$table->string('game_url',150);
		$table->string('name',20);
		$table->tinyInteger('enabled',);
		// $table->timestamp('updated_at')->default('CURRENT_TIMESTAMP');
		// $table->timestamp('created_at')->default('CURRENT_TIMESTAMP');
        $table->timestamps();
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('provider');
    }
}