<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTreatmentForPrescriptionIdOnMedicalDiagnosticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_diagnostics', function (Blueprint $table) {
            $table->renameColumn('treatment', 'prescription_id');
            
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medical_diagnostics', function (Blueprint $table) {
            $table->renameColumn('prescription_id', 'treatment');
            $table->string('treatment',200)->change();
            
            //
        });
    }
}
