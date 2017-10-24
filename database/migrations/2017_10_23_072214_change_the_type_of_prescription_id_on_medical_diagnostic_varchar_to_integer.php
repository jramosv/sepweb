<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTheTypeOfPrescriptionIdOnMedicalDiagnosticVarcharToInteger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_diagnostics', function (Blueprint $table) {
            $table->integer('prescription_id')->change()->unsigned();
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
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
            $table->string('prescription_id',200)->change();
            //
        });
    }
}
