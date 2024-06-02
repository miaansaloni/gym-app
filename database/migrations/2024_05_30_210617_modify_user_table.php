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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('username');
            $table->string('role');
            $table->string('profile_img')->nullable();
            $table->string('profile_img')->nullable();
            $table->tinyInteger('course_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('username');
            $table->string('role');
            $table->string('profile_img')->nullable();
        });
    }
};
