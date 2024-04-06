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
        Schema::create('sub_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('influence_id')->unsigned();
            $table->unsignedBigInteger('subscribe_id')->unsigned();

            $table->unique(['influence_id', 'subscribe_id']);

            $table->index('influence_id', 'sub_users_influence_idx');
            $table->foreign('influence_id', 'sub_users_influence_fk')->on('users')->references('id');

            $table->index('subscribe_id', 'sub_users_subscribe_idx');
            $table->foreign('subscribe_id', 'sub_users_subscribe_fk')->on('users')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_users');
    }
};