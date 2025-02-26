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
        $table->string('telp')->unique()->nullable();
        $table->string('address')->nullable();
        $table->string('photo')->nullable();
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->foreignId('role_id')->constrained('roles')->default(3);
        $table->foreignId('city_id')->constrained('cities')->nullable();
        $table->rememberToken();
        $table->timestamps();
        $table->index('role_id');
        $table->index('city_id');
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
