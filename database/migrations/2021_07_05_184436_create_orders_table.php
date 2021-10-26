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
    {// lấy ra được thông tin đơn hàng
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id')->comment('khóa chính');
            $table->integer('customer_id')->comment('người đặt hàng và địa chỉ');
            $table->integer('shipping_id')->comment('địa chỉ giao hàng');
            $table->integer('payment_id')->comment('hình thức thanh toán');
            $table->float('order_total')->comment('Tổng đơn hàng mình đã mua là bao nhiêu tiền');
            $table->integer('order_status')->comment('đơn hàng được kích hoạt , đã giao hàng , hay đã nhận hàng');
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
        Schema::dropIfExists('orders');
    }
}
