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
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->string('hash_tag');

            $table->index('post_id', 'post_hash_post_idx');
            $table->foreign('post_id', 'post_hash_post_fk')->on('posts')->references('id')->onDelete('cascade');
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