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
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        // الربط مع الوحدة هو الأهم هنا
        $table->foreignId('unit_id')->constrained('units')->cascadeOnDelete();
        
        $table->string('type'); // mcq, tf, fill (زي ما سميناهم في الـ JS)
        $table->text('question_text');
        $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium');
        $table->float('mark')->default(1.0);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
