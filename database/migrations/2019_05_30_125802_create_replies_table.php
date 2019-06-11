<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepliesTable extends Migration {

	public function up()
	{
		Schema::create('replies', function(Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('order_id');
			$table->unsignedBigInteger('supplier_id');
			$table->double('total')->default(0);
			$table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');

            $table->foreign('supplier_id')->references('id')->on('users')
                ->onDelete('cascade');

		});
	}

	public function down()
	{
		Schema::drop('replies');
	}
}
