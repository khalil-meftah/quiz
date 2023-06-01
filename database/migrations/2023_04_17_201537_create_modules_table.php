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
            $table->text('nomModule');
            $table->text('descriptionModule')->nullable();
            $table->integer('nombreHeuresModule')->nullable();
            $table->date('dateDebutModule')->nullable();
            $table->date('dateCreationModule')->nullable();
            $table->timestamps();
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
