<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderTable extends Migration
{
    public function up()
    {
        Schema::create('provider', function (Blueprint $table) {

		$table->increments('id')->unsigned()->comment('');
		$table->string('username',20)->comment('請求時的 provider 參數');
		$table->string('private_key',64)->comment('用來 hash 的 private key');
		$table->string('game_url',150)->comment('用來開啟遊戲的網址');
		$table->string('name',20)->comment('provider 名稱');
        // $table->integer('currency')->comment('貨幣add');
		$table->tinyInteger('enabled',)->comment('是否啟用');
        $table->timestamp('created_at')->useCurrent()->comment('建立時間');
        $table->timestamp('updated_at')->useCurrent()->comment('更新時間');
        // $table->timestamps(0);
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('provider');
    }
}