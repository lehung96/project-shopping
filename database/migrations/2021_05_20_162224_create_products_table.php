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
            $table->Increments('product_id');
            $table->string('name');
            $table->string('price');
            $table->text('desc');
            $table->text('content');
//            $table->string('image');
            $table->integer('user_id');//  khóa ngoại
            $table->integer('category_id');//  khóa ngoại
//            $table->integer('brand_id');//  khóa ngoại
            $table->integer('status');
            $table->timestamps();
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
