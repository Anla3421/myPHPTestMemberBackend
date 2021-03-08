<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerTable extends Migration
{
    public function up()
    {
        Schema::create('player', function (Blueprint $table) {

		// $table->increments('id')->unsigned();
        // $table->increments('id');
        $table->increments('id')->unsigned()->comment('');
		$table->integer('provider_id',)->unsigned()->unique()->comment('所屬遊戲商 provider.id');
        $table->integer('agent_id')->unsigned()->unique()->comment('所屬之 Agent_id add');
		$table->string('name',64)->unique()->comment('名稱');
		$table->string('uniq_id',64)->unique()->comment('使用者唯一id');
		$table->timestamp('last_at')->comment('最後登入時間');
        // $table->timestamps();
        // $table->primary(['id','provider_id']);
        
		
        

        });
    }

    public function down()
    {
        Schema::dropIfExists('player');
    }
}