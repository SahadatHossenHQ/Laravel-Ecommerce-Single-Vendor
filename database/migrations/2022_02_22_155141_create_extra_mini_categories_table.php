<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraMiniCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_mini_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mini_category_id')->constrained('mini_categories')->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('cover_photo')->default('default.png');
            $table->boolean('status')->default(true);
            $table->boolean('is_feature')->default(false);
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
        Schema::dropIfExists('extra_mini_categories');
    }
}
