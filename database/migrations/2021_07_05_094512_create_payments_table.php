<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id')->comment('khóa chính');
            $table->string('payment_method')->comment('hình thức thanh toán: bằng ví điện tử hoặc tiền mặt');
            $table->integer('payment_status')->comment('Tình trạng thanh toán: 0 là tắt ,1 là mở');
            $table->timestamps();

//            $table->bigIncrements('id');
//            $table->integer('order_id')->nullable();
//            $table->integer('customer_id')->nullable();
//            $table->float('p_money')->nullable()->comment('số tiền thanh toán');
//            $table->string('p_note')->nullable()->comment('nội dung thanh toán');
//            $table->string('p_vnp_response_code',255)->nullable()->comment('mã phản hồi');
//            $table->string('code_vnpay',255)->nullable()->comment('mã giao dịch vnpay');
//            $table->string('code_bank',255)->nullable()->comment('mã ngân hàng');
//            $table->dateTime('p_time')->nullable()->comment('thời gian chuyển khoản');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
