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
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->foreignId('stage_exam_id')->constrained()->onDelete('cascade');
            $table->string('type')->default('mcq'); // mcq, short, essay
            $table->text('question_text');
            $table->json('options')->nullable(); // لـ mcq فقط
            $table->string('correct_option')->nullable(); // mcq و short فقط
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_questions');
    }
};
