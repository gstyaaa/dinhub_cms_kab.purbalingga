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
        Schema::create('posts', function (Blueprint $table) {
    $table->id();

    $table->foreignId('post_category_id')
        ->constrained()
        ->cascadeOnUpdate()
        ->restrictOnDelete();

    $table->foreignId('user_id')
        ->constrained()
        ->cascadeOnUpdate()
        ->restrictOnDelete();

    $table->string('title');

    $table->string('slug')->unique();

    $table->text('excerpt')->nullable();

    $table->longText('content');

    $table->string('thumbnail')->nullable();

    $table->string('status')->default('draft');

    $table->boolean('is_headline')
        ->default(false);

    $table->timestamp('published_at')
        ->nullable();

    $table->string('meta_title')
        ->nullable();

    $table->text('meta_description')
        ->nullable();

    $table->timestamps();

    $table->softDeletes();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
