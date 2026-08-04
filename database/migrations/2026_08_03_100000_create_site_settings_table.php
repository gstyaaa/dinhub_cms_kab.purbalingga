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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->text('running_text')->nullable();
            $table->boolean('running_text_active')->default(true);
            $table->string('kadis_name')->default('SUTRISNO, S.Sos');
            $table->string('kadis_title')->default('Kepala Dinas Perhubungan Kabupaten Purbalingga');
            $table->string('kadis_photo')->nullable();
            $table->text('kadis_welcome_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
