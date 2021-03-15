<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->string('agent_name')->comment('Agent name');
            $table->string('products')->comment('我覺得應該是"廠商"');
            $table->string('members')->default('0')->comment('會員人數');
            $table->string('remark')->comment('備註');
            $table->string('status')->comment('狀態(0:下架,1:開放)');
            $table->timestamp('created_at')->useCurrent()->comment('新增時間');
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
        Schema::dropIfExists('agent');
    }
}
