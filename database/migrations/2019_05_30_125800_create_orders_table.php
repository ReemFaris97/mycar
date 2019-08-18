<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('company_model_id')->nullable();
//            $table->unsignedBigInteger('city_id');

            $table->integer('year')->nullable();
            $table->enum('parts_type', array('original', 'used','commercial'));
            $table->string('form_image')->nullable();
            $table->string('structure_number')->nullable();
            $table->enum('payment_type', array('cash', 'online','network'));
            $table->enum('status', array('new', 'current', 'accepted', 'completed'));
            $table->string('completed_status')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('cascade');

            $table->foreign('company_model_id')->references('id')->on('company_models')
                ->onDelete('cascade');

        });
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
