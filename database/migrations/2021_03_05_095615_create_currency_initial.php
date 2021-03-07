<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyInitial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_initial', function (Blueprint $table) {
            $table->id('cid')->comment('貨幣ID');
            // $table->integer('cid')->incrument();
            $table->string('game_currency')->comment('貨幣名稱');
            $table->enum('type',['G','V','R'])->comment('種類G=全域,V=虛擬,R=真實');
            $table->timestamp('created_at')->useCurrent()->comment('建立時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_initial');
    }
}
