<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); //Auto-incrementing UNSIGNED INTEGER (primary key) equivalent column.
            $table->string('uid')->unique();
            $table->string('name')->unique();
            $table->string('password');
            $table->enum('gender',['male','female']);
            $table->string('level');
            $table->enum('position',['user','administrator']);
            $table->string('remember_check')->nullable();
            $table->enum('status',['activated','deactivated'])->default('activated');
            $table->string('cellphone')->nullable();
            $table->rememberToken(); //Adds a nullable remember_token VARCHAR(100) equivalent column.
            $table->string('api_token',80)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
