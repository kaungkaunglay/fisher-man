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
        Schema::create('o_auths', function (Blueprint $table) {
            $table->id();
            $table->string('provider');
            $table->string('provider_user_id');
            $table->string('provider_user_name');   
            $table->string('provider_user_email')->nullable();
            $table->string('provier_user_avatar')->nullable();
            $table->string('access_token');
            $table->string('refresh_token')->nullable();
            $table->string('expires_in')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_auths');
    }
};
