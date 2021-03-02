<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {

		$table->increments('id');
		$table->string('token',64);
		$table->integer('gid',);
		$table->decimal('in',20,3);
		$table->decimal('out',20,3)->unsigned();
		$table->decimal('wage',10,3)->unsigned();
		$table->decimal('surplus',20,3)->default('0.000');
		$table->tinyInteger('goods',)->default('0');
		$table->tinyInteger('profile',)->default('0');
		$table->timestamp('created_at')->useCurrent();
		// $table->timestamps();
		// $table->primary('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
}