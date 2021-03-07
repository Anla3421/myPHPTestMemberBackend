<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyExchangeRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_exchange_rate', function (Blueprint $table) {
            $table->id()->comment('');
            $table->integer('cid')->comment('欲轉換之貨幣');
            $table->integer('changeby')->comment('被轉換之貨幣');
            $table->integer('exchange_rate')->comment('轉換比率');
            $table->timestamp('updated_at')->useCurrent()->comment('更新時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('currency_exchange_rate');
    }
}
