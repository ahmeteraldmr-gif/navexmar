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
        Schema::create('page_header_settings', function (Blueprint $table) {
            $table->id();
            $table->string('page_key')->unique()->index();
            $table->unsignedBigInteger('selected_image_id')->nullable();
            $table->boolean('use_random')->default(false);
            $table->decimal('overlay_opacity', 3, 2)->default(0.50);
            $table->string('overlay_color', 20)->default('#000000');
            $table->timestamps();
            
            $table->foreign('selected_image_id')->references('id')->on('header_images')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_header_settings');
    }
};
