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
            $table->string('order_id')->unique()->nullable();
            $table->string('invoice')->unique()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('country');
            $table->string('address');
            $table->string('town');
            $table->string('district');
            $table->string('thana');
            $table->string('post_code');
            $table->string('phone');
            // $table->string('email');
            $table->string('email')->nullable();
            $table->string('shipping_method');
            $table->string('payment_method');
            $table->string('mobile_number')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('holder_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('coupon_code')->nullable();
            $table->decimal('subtotal', 20, 2);
            $table->decimal('discount', 20, 2);
            $table->decimal('total', 20, 2);
            $table->integer('status')->default(0);
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
