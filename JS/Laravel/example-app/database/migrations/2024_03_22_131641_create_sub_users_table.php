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


            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('usersub_id');

            $table->index('user_id', 'sub_user_user_idx');
            $table->foreign('user_id', 'sub_user_user_fk')->on('users')->references('id');


            $table->foreign('usersub_id', 'sub_usersub_user_fk')->on('users')->references('id');

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