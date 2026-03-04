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
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attempt_id')->constrained('exam_attempts')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            // الخيار المختار (في حالة الاختيار من متعدد)
            $table->foreignId('selected_option_id')->nullable()->constrained('options')->nullOnDelete();
            // نص الإجابة (في حالة الأسئلة المقالية)
            $table->text('answer_text')->nullable();
            $table->boolean('is_correct')->nullable(); // يتم تحديده بعد التصحيح
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answers');
    }
};
