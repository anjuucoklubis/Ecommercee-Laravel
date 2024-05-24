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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
            $table->integer('price');
            $table->string('stock');
            $table->string('weight');
            $table->string('image');
            $table->foreignId('category_id')->constrained('category_products');
            $table->foreignId('user_id')->constrained('users');

            $table->timestamps();
         
            $table->index('category_id');
            $table->index('user_id');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
