<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportDtlTable extends Migration
{
    public function up()
    {
        Schema::create('report_dtl', function (Blueprint $table) {
		
		//Old comment	
		// $table->integer('id')->comment('貨物流水號');
		// $table->integer('seq')->comment('進貨順序');
		// $table->primary(['id','seq']);
		// $table->integer('tid')->comment('交易ID');
		// $table->decimal('in',20,3)->unsigned()->comment('進貨量');
		// $table->decimal('out',20,3)->unsigned()->comment('出貨量');
		// $table->decimal('surplus',20,3)->unsigned()->comment('剩餘量');
		// $table->string('round',50)->comment('預定出貨批次');
		// $table->string('result',512)->comment('進貨結果');
		// $table->string('remark',4096)->comment('進貨備註');

		$table->integer('id')->comment('編號');
		$table->integer('seq')->comment('順序');
		$table->primary(['id','seq']);
		$table->integer('tid')->comment('交易ID/沒給新的');
		$table->decimal('in',20,3)->unsigned()->comment('Bet');
		$table->decimal('out',20,3)->unsigned()->comment('Win');
		$table->decimal('surplus',20,3)->unsigned()->comment('總贏得');
		$table->string('round',50)->comment('局號');
		$table->string('result',512)->comment('指結果(牌型)-依照產品有不同顯示');
		$table->string('remark',4096)->comment('指結果細節-依照產品有不同顯示');
		
		// DB::statement('ALTER TABLE report_dtl MODIFY id INTEGER NOT NULL AUTO_INCREMENT');

        });
    }

    public function down()
    {
        Schema::dropIfExists('report_dtl');
    }
}