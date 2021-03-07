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
		$table->integer('gid')->unique()->unsigned()->comment('遊戲ID');
		$table->integer('info_id')->unsigned()->comment('遊戲資訊ID game_info.id');
		$table->integer('provider_id')->unsigned()->comment('所屬遊戲商 provider.id');
		$table->tinyInteger('status')->comment('狀態(0:下架,1:開放)');
        $table->timestamp('created_at')->useCurrent()->comment('建立時間');
        $table->timestamp('updated_at')->useCurrent()->comment('更新時間');
        // $table->timestamps(0);
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('game');
    }
}