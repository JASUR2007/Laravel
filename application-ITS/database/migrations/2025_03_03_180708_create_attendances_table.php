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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->date('date'); 
            $table->enum('status', ['present', 'absent'])->default('absent');
            $table->string('comments')->nullable();            
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
