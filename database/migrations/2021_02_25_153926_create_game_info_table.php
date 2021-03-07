<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameInfoTable extends Migration
{
    public function up()
    {
        Schema::create('game_info', function (Blueprint $table) {

		$table->increments('info_id')->unsigned()->comment('遊戲資訊ID');
		$table->string('name',50)->comment('遊戲名稱(繁中)');
		$table->string('name_cn',50)->comment('遊戲名稱(簡中)');
		$table->string('name_en',50)->comment('遊戲名稱(英文)');
		$table->string('name_jp',50)->comment('遊戲名稱(日文)');
		$table->string('server_host',30)->comment('Server位址');
		$table->string('server_path',10)->comment('Server目地路徑');
		$table->integer('server_port',)->comment('正式port');
		$table->integer('server_demo_port',)->comment('試玩port');
		$table->string('client_dir_name',30)->comment('前端放置目錄');
        $table->timestamp('created_at')->useCurrent()->comment('建立時間');
        $table->timestamp('updated_at')->useCurrent()->comment('更新時間');
		// $table->timestamps(0);
		// $table->primary('info_id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('game_info');
    }
}