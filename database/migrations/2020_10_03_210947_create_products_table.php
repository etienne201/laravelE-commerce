<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('p_id', 20)->nullable();
			$table->string('product_name', 30)->index();
			$table->string('brand', 30)->index();
			$table->string('product_ram', 6)->nullable();
			$table->string('product_rom', 6)->nullable();
			$table->string('product_cpu', 16)->nullable();
			$table->string('front_cam', 10)->nullable();
			$table->string('back_cam', 10)->nullable();
			$table->string('operating_sys', 10)->nullable();
			$table->string('phone_status', 15)->default('New');
			$table->string('manufacturing_country', 30);
			$table->integer('guaranty_months')->nullable();
			$table->integer('supplier_pr');
			$table->string('seller_pr');
			$table->string('media');
			$table->string('colors', 50)->nullable();
			$table->string("photo", 255)->nullable();
			$table->string('refurbished_status', 30)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
