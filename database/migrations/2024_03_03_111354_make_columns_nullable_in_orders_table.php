<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeColumnsNullableInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('last_name')->nullable()->change();
            $table->string('company_name')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('town')->nullable()->change();
            $table->string('district')->nullable()->change();
            $table->string('thana')->nullable()->change();
            $table->string('post_code')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('shipping_method')->nullable()->change();
            $table->decimal('shipping_charge', 10, 2)->nullable()->change();
            $table->decimal('single_charge', 10, 2)->nullable()->change();
            $table->string('payment_method')->nullable()->change();
            $table->string('mobile_number')->nullable()->change();
            $table->string('transaction_id')->nullable()->change();
            $table->string('bank_name')->nullable()->change();
            $table->string('account_number')->nullable()->change();
            $table->string('holder_name')->nullable()->change();
            $table->string('branch_name')->nullable()->change();
            $table->string('routing_number')->nullable()->change();
            $table->string('coupon_code')->nullable()->change();
            $table->decimal('subtotal', 10, 2)->nullable()->change();
            $table->decimal('discount', 10, 2)->nullable()->change();
            $table->boolean('is_pre')->nullable()->change();
            $table->decimal('total', 10, 2)->nullable()->change();
            $table->string('cart_type')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('last_name')->nullable(false)->change();
            $table->string('company_name')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('town')->nullable(false)->change();
            $table->string('district')->nullable(false)->change();
            $table->string('thana')->nullable(false)->change();
            $table->string('post_code')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('shipping_method')->nullable(false)->change();
            $table->decimal('shipping_charge', 10, 2)->nullable(false)->change();
            $table->decimal('single_charge', 10, 2)->nullable(false)->change();
            $table->string('payment_method')->nullable(false)->change();
            $table->string('mobile_number')->nullable(false)->change();
            $table->string('transaction_id')->nullable(false)->change();
            $table->string('bank_name')->nullable(false)->change();
            $table->string('account_number')->nullable(false)->change();
            $table->string('holder_name')->nullable(false)->change();
            $table->string('branch_name')->nullable(false)->change();
            $table->string('routing_number')->nullable(false)->change();
            $table->string('coupon_code')->nullable(false)->change();
            $table->decimal('subtotal', 10, 2)->nullable(false)->change();
            $table->decimal('discount', 10, 2)->nullable(false)->change();
            $table->boolean('is_pre')->nullable(false)->change();
            $table->decimal('total', 10, 2)->nullable(false)->change();
            $table->string('cart_type')->nullable(false)->change();
        });
    }
}
