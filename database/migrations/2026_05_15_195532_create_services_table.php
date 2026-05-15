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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->text('description');
            $table->text('description_en');
            $table->string('icon')->default('fas fa-cog');
            $table->text('features')->nullable();
            $table->text('features_en')->nullable();
            $table->integer('display_order')->default(0);
            $table->string('image_path')->nullable();
            $table->string('slug')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
