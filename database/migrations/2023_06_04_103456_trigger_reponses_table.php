<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TriggerReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER update_reponse_status_trigger
        BEFORE UPDATE ON reponses
        FOR EACH ROW
        BEGIN
            IF NEW.descriptionReponse <> OLD.descriptionReponse
                OR NEW.valeurReponse <> OLD.valeurReponse
                OR NEW.question_id <> OLD.question_id
            THEN
                SET NEW.status = "pending";
            END IF;
        END;
        
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS `2023_06_04_103456_trigger_reponses_table`');
    }
}
