<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->Increments('shipping_id');
            $table->string('shipping_name');
            $table->integer('customer_id');//customer_id là thông tin mua hàng dựa trên người mua hàng
            //người mua hàng nào sẽ có customer_id đó
            $table->string('shipping_address');
            $table->string('shipping_phone');
            $table->string('shipping_notes');
            $table->integer('matp');//  khóa ngoại
            $table->integer('maqh');//  khóa ngoại
            $table->integer('xaid');//  khóa ngoại
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
        Schema::dropIfExists('shippings');
    }
}
