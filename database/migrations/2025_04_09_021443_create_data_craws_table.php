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
        Schema::create('data_craws', function (Blueprint $table) {
            $table->id();
            $table->text('category')->nullable();
            $table->string('market')->nullable();
            $table->string('market_code')->nullable();
            $table->string('date')->nullable();
            $table->string('fish_type')->nullable();
            $table->float('quantity')->nullable();
            $table->string('unit')->nullable();

            
            $table->float('composition_large')->nullable();
            $table->float('composition_medium')->nullable();
            $table->float('composition_small')->nullable();
            $table->float('composition_vary_small')->nullable();

            
            $table->float('large_high')->nullable();
            $table->float('large_medium')->nullable();
            $table->float('large_low')->nullable();

            
            $table->float('medium_high')->nullable();
            $table->float('medium_middle')->nullable();
            $table->float('medium_low')->nullable();

            
            $table->float('small_high')->nullable();
            $table->float('small_middle')->nullable();
            $table->float('small_low')->nullable();

            
            $table->float('additional_high')->nullable();
            $table->string('additional_middle')->nullable();
            $table->string('additional_low')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_craws');
    }
};
