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
<<<<<<<< HEAD:database/migrations/2023_12_26_100230_create_genres_table.php
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
========
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user', 'admin'])->default('user');
>>>>>>>> 48121fdc9657c380445fe1c713a54e2fdf538d14:database/migrations/2023_12_29_091052_add_role_to_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2023_12_26_100230_create_genres_table.php
        Schema::dropIfExists('genres');
========
        Schema::table('users', function (Blueprint $table) {
            //
        });
>>>>>>>> 48121fdc9657c380445fe1c713a54e2fdf538d14:database/migrations/2023_12_29_091052_add_role_to_users_table.php
    }
};
