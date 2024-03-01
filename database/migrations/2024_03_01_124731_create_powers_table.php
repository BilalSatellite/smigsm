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
        Schema::create('powers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('desc')->nullable();
            $table->longText('content')->nullable();
            $table->foreignId('ic_brand_id')->constrained('ic_brands')->cascadeOnDelete();
            $table->foreignId('ic_type_id')->constrained('ic_types')->cascadeOnDelete();
            $table->foreignId('ic_categorie_id')->constrained('ic_categories')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('powers');
    }
};
