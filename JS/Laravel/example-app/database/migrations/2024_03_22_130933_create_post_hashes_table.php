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
        Schema::create('post_hashes', function (Blueprint $table) {

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('hashtag_id');

            $table->unique(['post_id', 'hashtag_id']);

            $table->index('post_id', 'post_hash_post_idx');
            $table->foreign('post_id', 'post_hash_post_fk')->on('posts')->references('id')->onDelete('cascade');

            $table->index('hashtag_id', 'hashtag_hashtag_id_idx');
            $table->foreign('hashtag_id', 'post_hash_hash_fk')->on('hashetags')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_hashes');
    }
};