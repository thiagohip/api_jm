<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stack_users', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("stack_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign('stack_id')->references('id')->on('stacks');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stack_user');
    }
};
