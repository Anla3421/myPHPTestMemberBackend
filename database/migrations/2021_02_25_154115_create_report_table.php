<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
		
		//Old comment
		// $table->increments('id')->comment('貨物流水號');
		// $table->string('token',64)->comment('貨物人員編號');
		// // $table->integer('gid',)->comment('出貨所在地ID');
		// $table->string('gid',6)->comment('出貨所在地ID');
		// $table->decimal('in',20,3)->comment('進貨量');
		// $table->decimal('out',20,3)->unsigned()->comment('出貨量');
		// $table->decimal('wage',10,3)->unsigned()->comment('工資');
		// $table->decimal('surplus',20,3)->default('0.000')->comment('剩餘量');
		// $table->tinyInteger('goods',)->default('0')->comment('貨物種類');
		// $table->tinyInteger('profile',)->default('0')->comment('貨物保存方式');
		// $table->timestamp('created_at')->useCurrent()->comment('產生時間');

		$table->increments('id')->comment('編號');
		$table->string('token',64)->comment('Member');
		// $table->integer('gid',)->comment('出貨所在地ID');
		$table->string('gid',6)->comment('就是gid');
		$table->decimal('in',20,3)->comment('Bet');
		$table->decimal('out',20,3)->unsigned()->comment('Win');
		$table->decimal('wage',10,3)->unsigned()->comment('手續費');
		$table->decimal('surplus',20,3)->default('0.000')->comment('TW');
		$table->tinyInteger('goods',)->default('0')->comment('指類型，例如一般、JP、紅包');
		// $table->tinyInteger('profile',)->default('0')->comment('總贏得');
		$table->tinyInteger('profile',)->default('1')->comment('幣別');
		$table->timestamp('created_at')->useCurrent()->comment('時間');
		// $table->timestamps();
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
}