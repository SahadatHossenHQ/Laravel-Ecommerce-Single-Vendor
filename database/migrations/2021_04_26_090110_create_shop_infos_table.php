<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->boolean('is_admin')->default(false);
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('url');
            $table->string('bank_account');
            $table->string('bank_name');
            $table->string('holder_name');
            $table->string('branch_name');
            $table->string('routing');
            $table->string('profile');
            $table->string('cover_photo');
            $table->text('description');
            $table->decimal('commission', 20, 2)->nullable();
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
        Schema::dropIfExists('shop_infos');
    }
}
