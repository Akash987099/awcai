<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_cms_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            $table->string('title', 180);
            $table->string('slug', 180);
            $table->longText('content');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->string('meta_title', 160)->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
            $table->unique(['client_id', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_cms_pages');
    }
};
