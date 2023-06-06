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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('descriptionQuestion');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('validated_by')->nullable();
            $table->unsignedBigInteger('chapitre_id');
            $table->foreign('chapitre_id')->references('id')->on('chapitres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};