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
        // First add the new column
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('author_id')->nullable();
        });

        // Then copy the data
        DB::statement('UPDATE posts SET author_id = user_id');

        // Finally remove the old column
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint if exists
            $table->dropForeign(['user_id']);
            
            // Add foreign key to new column
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            
            // Drop old column
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First add the old column back
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
        });

        // Then copy the data back
        DB::statement('UPDATE posts SET user_id = author_id');

        // Finally remove the new column
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['author_id']);
            
            // Add foreign key to old column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Drop new column
            $table->dropColumn('author_id');
        });
    }
}; 