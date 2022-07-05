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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignid('blog_categories_id');
            $table->string('title');
            $table->string('slug');
            $table->string('post');
            $table->string('feat_image');
            $table->string('excerpt');
            $table->string('meta');
            $table->integer('is_video_feat');
            $table->integer('post_view');
            $table->integer('is_published');
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
        Schema::dropIfExists('blogs');
    }
};
