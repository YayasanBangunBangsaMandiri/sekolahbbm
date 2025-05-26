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
        Schema::table('letter_settings', function (Blueprint $table) {
            $table->string('logo_path')->nullable()->after('id');
            $table->string('header_text_color')->default('#000000')->after('letter_header_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('letter_settings', function (Blueprint $table) {
            $table->dropColumn(['logo_path', 'header_text_color']);
        });
    }
}; 