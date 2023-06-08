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
        $sql = "CREATE PROCEDURE bday()
            BEGIN
            SELECT  name  FROM users where Date_Format(CURDATE(),'%m-%d') = Date_Format(dateDeNaissance ,'%m-%d');
            END;";

        DB::unprepared($sql);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedure_migration');
    }
};
