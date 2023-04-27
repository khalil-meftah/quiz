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
        Schema::create('chapitres', function (Blueprint $table) {
            $table->id();
            $table->text('nomChapitre')->nullable();
            $table->text('descriptionChapitre')->nullable();
            $table->integer('nombreHeuresChapitre');
            $table->date('dateDebutChapitre');
            $table->date('dateCreationChapitre');
            $table->timestamps();
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapitres');
    }
};
