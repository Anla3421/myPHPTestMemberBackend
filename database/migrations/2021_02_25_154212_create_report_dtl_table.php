<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportDtlTable extends Migration
{
    public function up()
    {
        Schema::create('report_dtl', function (Blueprint $table) {

		$table->integer('id',true,true);
		$table->integer('seq',false,true);
		// $table->primary(['id','seq']);
		$table->integer('tid',);
		$table->decimal('in',20,3);
		$table->decimal('out',20,3);
		$table->decimal('surplus',20,3);
		$table->string('round',50);
		$table->string('result',512);
		$table->string('remark',4096);
		
		// DB::statement('ALTER TABLE report_dtl MODIFY id INTEGER NOT NULL AUTO_INCREMENT');

        });
    }

    public function down()
    {
        Schema::dropIfExists('report_dtl');
    }
}