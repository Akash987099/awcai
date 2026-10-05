<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_about', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->unique();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('organization')->nullable();
            $table->text('description')->nullable();
            $table->string('primary_image')->nullable();
            $table->string('secondary_image')->nullable();
            $table->string('stat_one_value', 80)->nullable();
            $table->string('stat_one_label', 120)->nullable();
            $table->string('stat_two_value', 80)->nullable();
            $table->string('stat_two_label', 120)->nullable();
            $table->string('read_more_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_about');
    }
};
