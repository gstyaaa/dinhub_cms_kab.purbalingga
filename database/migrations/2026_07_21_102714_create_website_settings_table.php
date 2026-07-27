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
    Schema::create('website_settings', function (Blueprint $table) {
        $table->id();

        // Informasi Website
        $table->string('site_name');
        $table->string('institution_name');

        // Logo
        $table->string('logo')->nullable();
        $table->string('logo_white')->nullable();
        $table->string('favicon')->nullable();

        // Kontak
        $table->text('address')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();

        // Media Sosial
        $table->string('facebook')->nullable();
        $table->string('instagram')->nullable();
        $table->string('youtube')->nullable();

        // Lokasi
        $table->longText('google_maps')->nullable();

        // Footer
        $table->string('copyright')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_settings');
    }
};
