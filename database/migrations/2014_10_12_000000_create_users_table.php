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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->enum('user_type', [1, 2])->default(1); // 2 عميل 1&&  فريق عمل
            $table->integer('user_code')->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};