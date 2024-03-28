<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->string('user_tag');

            $table->index('user_tag', 'post_tag_user_idx');
            $table->foreign('user_tag', 'post_tag_user_fk')->on('users')->references('tag');

            $table->index('post_id', 'post_tag_post_idx');
            $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tags');
    }
};