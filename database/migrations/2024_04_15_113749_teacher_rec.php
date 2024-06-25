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
        Schema::create('teacher_rec', function (Blueprint $table) {
            $table->id();
            $table->integer("student_id");
            $table->string('student_name');
            $table->integer("teacher_id");
            $table->date("lesson_date");
            $table->string("teacher_name");
            $table->text("teacher_comment");
            $table->string("video")->nullable();
            $table->time("duration")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_rec');
    }
};
