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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->date('birthdate');
            $table->string('place_of_birth');
            $table->string('gender');
            $table->string('address');
            $table->string('parent_name');
            $table->string('parent_phone');
            $table->string('previous_school');
            $table->foreignId('major_id')->constrained('majors');
            $table->string('status')->default('pending'); // pending, accepted, rejected
            $table->string('nisn')->nullable()->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
