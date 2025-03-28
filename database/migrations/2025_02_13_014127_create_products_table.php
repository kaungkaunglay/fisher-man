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
            $table->integer('product_price');
            $table->string('product_image')->nullable();
            $table->integer('stock')->default(0);
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('size', 8, 2)->nullable();
            $table->date('day_of_caught')->nullable();
            $table->date('expiration_date')->nullable();
            $table->integer('discount')->nullable();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('status')->default('pending');
            $table->timestamps();
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
