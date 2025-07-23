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
       Schema::create('course_student', function (Blueprint $table) {
    $table->id();

    // Foreign key to courses table
    $table->foreignId('course_id')
          ->constrained('courses')     // references id on courses
          ->onDelete('cascade');       // delete pivot rows if course deleted

    // Foreign key to students table
    $table->foreignId('student_id')
          ->constrained('users')    // references id on students
          ->onDelete('cascade');       // delete pivot rows if student deleted

    $table->timestamps();

    // Optional: prevent duplicate enrollment
    $table->unique(['course_id', 'student_id']);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
