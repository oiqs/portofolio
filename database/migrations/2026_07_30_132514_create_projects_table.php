<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('year')->default('2025');
            $table->string('role')->default('Solo Trip & Nature');
            $table->json('stack')->nullable();
            $table->text('problem')->nullable();
            $table->text('solution')->nullable();
            $table->text('impact')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
