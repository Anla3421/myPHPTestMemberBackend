<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerSaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_save', function (Blueprint $table) {
            // $table->integer('gid')->unsigned()->comment('遊戲ID');
            $table->string('gid',6)->comment('遊戲ID');
            $table->string('name',20)->comment('參數名');
            $table->string('profile',10)->comment('設定檔名');
            $table->primary(['gid','name','profile']);
            $table->string('value',300)->comment('參數值');
            $table->timestamp('updated_at')->useCurrent()->comment('更新時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_save');
    }
}
