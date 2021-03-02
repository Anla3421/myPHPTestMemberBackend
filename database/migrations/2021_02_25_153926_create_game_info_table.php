<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameInfoTable extends Migration
{
    public function up()
    {
        Schema::create('game_info', function (Blueprint $table) {

		$table->increments('info_id')->unsigned();
		$table->string('name',50);
		$table->string('name_cn',50);
		$table->string('name_en',50);
		$table->string('name_jp',50);
		$table->string('server_host',30);
		$table->string('server_path',10);
		$table->integer('server_port',);
		$table->integer('server_demo_port',);
		$table->string('client_dir_name',30);
        $table->timestamp('created_at')->useCurrent();
        $table->timestamp('updated_at')->useCurrent();
		// $table->timestamps(0);
		// $table->primary('info_id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('game_info');
    }
}