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
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('brand_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('short_description');
            $table->longText('full_description');
            $table->decimal('regular_price');
            $table->decimal('discount_price');
            $table->integer('quantity');
            $table->string('unit')->nullable();
            $table->string('image');
            $table->boolean('shipping_charge');
            $table->boolean('point')->default(false);
            $table->boolean('reach')->default(false);
            $table->boolean('status');
            $table->boolean('is_aproved');
            $table->boolean('download_able');
            $table->integer('download_limit')->nullable();
            $table->date('download_expire')->nullable();
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
