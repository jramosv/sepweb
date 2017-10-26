<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\MedicalAppointment;
use App\MedicalDiagnostic;
use App\Patient;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;

class MedicalDiagnosticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medical_diagnostics.index');
    }

    public function getMedicalDiagnosticsData()
    {

        $medical_diagnostics = DB::table('medical_diagnostics')
           ->join('medical_appointments', 'medical_diagnostics.medical_appointment_id', '=', 'medical_appointments.id')
           ->join('patients', 'medical_diagnostics.patient_id', '=', 'patients.id')
           ->select('medical_diagnostics.id', 
            'medical_appointments.id',
            'patients.last_name',
            'medical_diagnostics.symptom',
            // 'medical_diagnostics.treatment',
            'medical_diagnostics.diagnosis'     
        )->get();

        return datatables($medical_diagnostics)->toJson();

    }

    
    public function listarDiagnosticosPdf(){
        
        $diagnosticos = MedicalDiagnostic::all();
        view()->share('diagnosticos',$diagnosticos);
        $pdf = PDF::loadView('medical_diagnostics.reports.report_all');
        return $pdf->download('allAppointments.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
