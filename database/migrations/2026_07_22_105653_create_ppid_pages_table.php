<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppid_pages', function (Blueprint $table) {
    $table->id();

    $table->enum('category', [
        'profil_ppid',
        'program_kegiatan',
        'sakip',
        'peraturan',
    ])->unique();

    $table->string('title');

    $table->longText('content')->nullable();

    $table->string('attachment')->nullable();

    $table->boolean('is_published')->default(true);

    $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('ppid_pages');
    }
};