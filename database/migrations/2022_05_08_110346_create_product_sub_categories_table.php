<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignid('product_categories_id');
            $table->string('subcategory_name');
            $table->string('slug');
            $table->integer('status')->default('0');
            $table->foreignid('created_by')->constraint('user');
            $table->foreignid('updated_by')->nullable()->constraint('user');
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
        Schema::dropIfExists('product_sub_categories');
    }
};
