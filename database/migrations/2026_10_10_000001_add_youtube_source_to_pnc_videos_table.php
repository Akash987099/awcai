<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pnc_videos', function (Blueprint $table) {
            $table->string('source_type', 20)->default('upload')->after('title');
            $table->string('youtube_url')->nullable()->after('video_path');
        });
    }

    public function down(): void
    {
        Schema::table('pnc_videos', function (Blueprint $table) {
            $table->dropColumn(['source_type', 'youtube_url']);
        });
    }
};
