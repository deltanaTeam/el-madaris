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
        Schema::create('stage_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_stage_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('video_path'); // ممكن URL أو مسار على السيرفر
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_videos');
    }
};
