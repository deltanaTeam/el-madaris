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
        Schema::create('stage_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_stage_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->boolean('is_required')->default(true); // يجب اجتيازه للانتقال؟
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_exams');
    }
};
