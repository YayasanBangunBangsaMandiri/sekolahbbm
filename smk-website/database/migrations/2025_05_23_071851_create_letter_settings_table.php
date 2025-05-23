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
        Schema::create('letter_settings', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->text('school_address');
            $table->string('school_phone');
            $table->string('school_email');
            $table->string('principal_name');
            $table->string('principal_nip');
            $table->integer('letter_margin_top')->default(20);
            $table->integer('letter_margin_right')->default(20);
            $table->integer('letter_margin_bottom')->default(20);
            $table->integer('letter_margin_left')->default(20);
            $table->string('paper_size')->default('A4');
            $table->string('paper_orientation')->default('portrait');
            $table->string('foundation_name')->default('YAYASAN BANGUN BANGSA MANDIRI (YBBM) INDRAMAYU');
            $table->string('school_name_kop')->default('SMK BANGUN BANGSA MANDIRI KANDANGHAUR');
            $table->string('school_tagline')->default('SEKOLAH PUSAT KEUNGGULAN');
            $table->string('school_website')->default('smkbbmindramayu.sch.id');
            $table->string('school_decree')->default('SK. Kepala Dinas Pendidikan Kab. Indramayu No. 421.5 / Kep. 05 – Disdik/ 2007');
            $table->string('letter_header_color')->default('#006400');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_settings');
    }
};
