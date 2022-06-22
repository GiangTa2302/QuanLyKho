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
            $table->decimal('giaNhap', 20, 2)->default(0);
            $table->decimal('giaXuat', 20, 2)->default(0);
            $table->timestamp('tgBaoQuan')->nullable();
            $table->text('description');
            $table->integer('quantity')->default(0);
            $table->string('image')->nullable()->default("1652787335.jpg");
            $table->text('images')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
