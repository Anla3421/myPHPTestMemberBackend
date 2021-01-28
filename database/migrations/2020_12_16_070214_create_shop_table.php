<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('shop', function (Blueprint $table) {
			$table->id();
			$table->integer('pid')->nullable()->comment('圖片id');
			$table->string('title')->comment('標題');
			$table->string('classify')->comment('分類');
			$table->longText('description')->comment('敘述');
			$table->boolean('top')->comment('是否置頂');
			$table->decimal('price', 10, 2)->comment('單價');
			$table->decimal('finalprice', 10, 2)->comment('折扣完價格');
			$table->integer('amount')->unsigned()->commnet('數量');
			$table->integer('discount')->default(0)->comment('折扣%數');
			$table->integer('kid')->comment('關鍵字id');
			$table->integer('type')->comment('1 統一價格,0:分種類價格');
			$table->integer('did')->default(0)->comment('detailid');
			$table->boolean('release')->default(0)->comment('是否上架');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('shop');
	}
}
