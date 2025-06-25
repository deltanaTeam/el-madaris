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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_subject_id')->constrained('level_subject')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price',8,2)->default(0);
            $table->boolean('is_free')->default(false);
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');;

            $table->timestamps();
        });
        Schema::create('course_goals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->text('goal_text');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_goals');

        Schema::dropIfExists('courses');
    }
};
