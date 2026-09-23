<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('construction_progress', function (Blueprint $table) {
            $table->id();
            $table->string('period');       // e.g. "September 2024"
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('progress_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('construction_progress_id')->constrained('construction_progress')->cascadeOnDelete();
            $table->string('image');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('progress_images');
        Schema::dropIfExists('construction_progress');
    }
};
