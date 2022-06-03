<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('tenSP');
            $table->string('DVT');
            $table->string('mauSac');
            $table->decimal('regular_price')->nullable()->default(0);
            $table->decimal('sale_price')->nullable();
            $table->timestamp('tgBaoQuan')->nullable();
            $table->text('description');
            $table->string('image');
            $table->text('images')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
