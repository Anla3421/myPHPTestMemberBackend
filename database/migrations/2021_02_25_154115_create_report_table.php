<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {

		$table->increments('id')->comment('貨物流水號');
		$table->string('token',64)->comment('貨物人員編號');
		// $table->integer('gid',)->comment('出貨所在地ID');
		$table->string('gid',6)->comment('出貨所在地ID');
		$table->decimal('in',20,3)->comment('進貨量');
		$table->decimal('out',20,3)->unsigned()->comment('出貨量');
		$table->decimal('wage',10,3)->unsigned()->comment('工資');
		$table->decimal('surplus',20,3)->default('0.000')->comment('剩餘量');
		$table->tinyInteger('goods',)->default('0')->comment('貨物種類');
		$table->tinyInteger('profile',)->default('0')->comment('貨物保存方式');
		$table->timestamp('created_at')->useCurrent()->comment('產生時間');
		// $table->timestamps();
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
}