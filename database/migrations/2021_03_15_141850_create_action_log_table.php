<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_log', function (Blueprint $table) {
            $table->id();
            $table->integer('user')->comment('使用者');
            $table->string('url')->comment('使用位址');
            // $table->string('action')->comment('行為');
            $table->enum('action',['Read','Update','Create'])->comment('行為');
            $table->enum('result',['success','fail'])->nullable()->comment('變更結果');
            $table->longText('origin_data')->nullable()->comment('原始之資料');
            $table->longText('alter_data')->nullable()->comment('變更之資料');
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
        Schema::dropIfExists('action_log');
    }
}
