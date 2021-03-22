<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerConfigTable extends Migration
{
    public function up()
    {
        Schema::create('server_config', function (Blueprint $table) {

		$table->integer('gid',)->comment('遊戲ID');
		$table->string('name',20)->comment('參數名');
		$table->string('profile',10)->comment('設定檔名/貨幣(?)');
		$table->string('value',300)->comment('參數值');
		$table->datetime('updated_at')->useCurrent()->comment('更新時間');
		$table->primary(['gid','name','profile']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('server_config');
    }
}