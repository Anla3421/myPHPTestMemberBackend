<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotoTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('photo', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('shop_id')->comment('商品id')->nullable();
			$table->string('title')->comment('goods_title')->nullable();
			$table->string('filename')->comment('photo alt name');
			$table->longText('path')->comment('路徑');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('photo');
	}
}
