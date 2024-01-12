<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiniCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mini_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('sub_categories')->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('cover_photo')->default('default.png');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('mini_categories');
    }
}
