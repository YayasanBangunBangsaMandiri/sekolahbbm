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
        Schema::table('posts', function (Blueprint $table) {
            // Add new fields
            $table->boolean('is_featured')->default(false)->after('user_id');
            $table->string('meta_description')->nullable()->after('is_featured');
            $table->string('meta_keywords')->nullable()->after('meta_description');
            $table->enum('status', ['draft', 'published'])->default('published')->after('meta_keywords');
            $table->timestamp('event_date')->nullable()->after('status');
            $table->string('event_location')->nullable()->after('event_date');
            
            // Modify existing fields
            $table->string('category')->comment('news, events, achievements, sustainability')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn([
                'is_featured',
                'meta_description',
                'meta_keywords',
                'status',
                'event_date',
                'event_location',
            ]);
            
            // Revert comment change on category
            $table->string('category')->change();
        });
    }
}; 