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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->nullable();
            $table->string('full_name');
            $table->string('chinese_name')->nullable();;
            $table->string('gender');
            $table->date('dob');
            $table->string('phone_no');
            $table->text('adress');
            $table->string('em_person')->nullable();
            $table->string('em_relation')->nullable();
            $table->string('em_phone')->nullable();
            $table->string('campus');
            $table->string('School_attending')->nullable();
            $table->string('student_no');
            $table->string('grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
