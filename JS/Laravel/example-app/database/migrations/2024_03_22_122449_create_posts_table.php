<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable(false);
            $table->string('title')->nullable(false);
            $table->string('short_content')->nullable(false);
            $table->dateTime('create_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('user_id')->nullable(0);
            $table->string('user_tag');
            $table->index('user_id', 'post_user_idx');
            $table->foreign('user_id', 'post_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};