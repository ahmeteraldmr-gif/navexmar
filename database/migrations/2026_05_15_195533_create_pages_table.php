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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_key')->unique()->index();
            $table->string('title_tr');
            $table->string('title_en');
            $table->text('subtitle_tr')->nullable();
            $table->text('subtitle_en')->nullable();
            $table->text('meta_description_tr')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->text('meta_keywords_tr')->nullable();
            $table->text('meta_keywords_en')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
