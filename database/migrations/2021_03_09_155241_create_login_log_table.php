<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     
    public function up()
    {
        Schema::create('login_log', function (Blueprint $table) {
            $table->id();
            $table->string('account')->comment('');
            $table->string('ip')->comment('');
            $table->string('agent')->comment('');
            $table->string('devicetype')->comment('');
            $table->string('platform')->comment('');
            $table->string('platformVersion')->comment('');
            $table->string('browser')->comment('');
            // $table->string('browserVersion')->comment('');       
            $table->string('times')->comment('登入次數');
            $table->string('Result')->comment('登入結果');
            $table->string('continue_fail')->comment('失敗次數');
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
        Schema::dropIfExists('login_log');
    }
}
