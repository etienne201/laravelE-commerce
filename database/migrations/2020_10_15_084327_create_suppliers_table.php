<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
	{
		Schema::create('suppliers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('key_contact_name', 30);
			$table->string('company_name', 30);
			$table->string('email', 40);
			$table->string('city', 30);
			$table->string('address', 50);
			$table->string('phone', 20);
			$table->string('whatsapp', 20);
			$table->string('cni', 30);
			$table->string('numero_contribuable', 30);
		});
	}

	public function down()
	{
		Schema::drop('suppliers');
	}
}
