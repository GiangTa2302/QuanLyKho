<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('province');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('note')->nullable();
            $table->decimal('total', 20, 2)->default(0);
            $table->boolean('is_check')->nullable();
            $table->boolean('is_payment');
            $table->string('typeOrder');
            $table->string('tenNVK')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
