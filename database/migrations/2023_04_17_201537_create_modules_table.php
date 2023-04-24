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
        Schema::create('modules', function (Blueprint $table) {
             $table->id();
            $table->text('nomModule')->nullable();
            $table->text('descriptionModule')->nullable();
            $table->integer('nombreHeuresModule');
            $table->date('dateDebutModule');
            $table->date('dateCreationModule');
            $table->timestamps();
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
