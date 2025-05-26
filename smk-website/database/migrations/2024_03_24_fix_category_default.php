<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // First ensure category has a default value
            DB::statement("UPDATE posts SET category = 'uncategorized' WHERE category IS NULL");
            
            // Then modify the column to not allow null and have a default
            $table->string('category')->default('uncategorized')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('category')->nullable()->change();
        });
    }
}; 