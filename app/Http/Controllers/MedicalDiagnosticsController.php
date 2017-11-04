<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\MedicalAppointment;
use App\MedicalDiagnostic;
use App\Patient;
use Yajra\Datatables\Datatables;
use App\Http\Requests\MedicalDiagnosticsFormRequest;

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
            'medical_appointments.id as md',
            'patients.last_name',
            'medical_diagnostics.symptom',
            'medical_diagnostics.treatment',
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
        $pacientes = Patient::all();
        $citas = MedicalAppointment::all();
        return view('medical_diagnostics.create', compact('citas','pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalDiagnosticsFormRequest $request)
    {
         $medical_diagnostic = new MedicalDiagnostic();

        $medical_diagnostic->medical_appointment_id = $request->medical_appointment_id;
        $medical_diagnostic->patient_id = $request->patient_id;
        $medical_diagnostic->treatment = $request->treatment;
        $medical_diagnostic->symptom = $request->symptom;
        $medical_diagnostic->diagnosis = $request->diagnosis;
        $medical_diagnostic->save();
        return redirect('/diagnosticos')->with('status', 'El Diagnostico se creo correctamente!');
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
        
        $medical_diagnostic = MedicalDiagnostic::find($id);
        $pacientes = Patient::all();
        $citas = MedicalAppointment::all();
        return view('medical_diagnostics.edit', compact('citas','pacientes','medical_diagnostic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalDiagnosticsFormRequest $request, MedicalDiagnostic $medical_diagnostic)
    {
          $medical_diagnostic->update(
            $request->only(
                [
                    'medical_appointment_id', 
                    'patient_id', 
                    'treatment',
                    'symptom',
                    'diagnosis',
                ]
            ));
        return redirect('/diagnosticos')->with('status', 'El diagnostico se actualizo correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalDiagnostic $medical_diagnostic)
    {
        $medical_diagnostic->delete();
        return redirect('/diagnosticos')->with('status', 'La Cita Medica se elimino de forma permanente!');
    }
}
