<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServerConfigTable extends Migration
{
    public function up()
    {
        Schema::create('server_config', function (Blueprint $table) {

		$table->integer('gid',);
		$table->string('name',20);
		$table->string('profile',10);
		$table->string('value',300);
		$table->datetime('updated_at');
		$table->primary(['gid','name','profile']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('server_config');
    }
}