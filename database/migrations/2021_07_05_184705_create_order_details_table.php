<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {// chi tiết đơn đặt hàng sẽ show ra tất cả sản phẩm mình đã mua, dựa vào order_id
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('order_details_id')->comment('khóa chính');
            $table->integer('order_id')->comment('khóa chính');
            $table->integer('product_id')->comment('lấy ra sản phẩm mua');
            $table->string('product_name')->comment('tên sản phẩm');
            $table->float('product_price');
            $table->integer('product_sales_quantity')->comment('số lượng sản phẩ mình đã mua');
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
        Schema::dropIfExists('order_details');
    }
}
