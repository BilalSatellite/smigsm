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
        Schema::create('category_processor', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_categorie_ic_id')->constrained('sub_categorie_ics')->cascadeOnDelete();
            $table->foreignId('processor_id')->constrained('processors')->cascadeOnDelete();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_processor');
    }
};
