<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
	{		 
		Schema::table('product_photos', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('product_photos', function(Blueprint $table) {
			$table->foreign('photo_id')->references('id')->on('photos')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         
		Schema::table('product_photos', function(Blueprint $table) {
			$table->dropForeign('product_photos_product_id_foreign');
		});
		Schema::table('product_photos', function(Blueprint $table) {
			$table->dropForeign('product_photos_photo_id_foreign');
		});
	}
}
