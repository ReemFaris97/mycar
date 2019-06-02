<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReplyDetailsTable extends Migration {

	public function up()
	{
		Schema::create('reply_details', function(Blueprint $table) {
			$table->bigIncrements('id');
            $table->unsignedBigInteger('reply_id');
            $table->unsignedBigInteger('order_details_id');
            $table->unsignedBigInteger('order_id');
            $table->double('part_price');
            $table->double('total_parts');

            $table->foreign('reply_id')->references('id')->on('replies')
                ->onDelete('cascade');

            $table->foreign('order_details_id')->references('id')->on('order_details')
                ->onDelete('cascade');

            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('cascade');

            $table->timestamps();

        });
	}

	public function down()
	{
		Schema::drop('reply_details');
	}
}
