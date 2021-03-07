<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerSaveTable extends Migration
{
    public function up()
    {
        Schema::create('player_save', function (Blueprint $table) {

		$table->integer('gid')->comment('遊戲ID');
		$table->string('token',50)->comment('玩家token');
		$table->string('name',20)->comment('存檔名稱');
		$table->string('profile',10)->comment('設定檔名');
		$table->string('value',300)->nullable()->default('NULL')->comment('存檔內容');
		$table->timestamp('updated_at')->comment('建立時間');
        $table->primary(['gid','token','name','profile']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('player_save');
    }
}
