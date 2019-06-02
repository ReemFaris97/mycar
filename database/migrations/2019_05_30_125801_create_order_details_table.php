<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderDetailsTable extends Migration {

	public function up()
	{
		Schema::create('order_details', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('order_id');
			$table->unsignedBigInteger('part_id');
			$table->string('image')->nullable();
			$table->integer('quantity');

			$table->longText('description')->nullable();
			$table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');

            $table->foreign('part_id')->references('id')->on('parts')
                ->onDelete('cascade');

		});
	}

	public function down()
	{
		Schema::drop('order_details');
	}
}
