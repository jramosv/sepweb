<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\MedicalAppointment;
use App\Doctor;
use App\Patient;
use App\AppointmentStatus;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests\MedicalAppointmentsFormRequest;

class MedicalAppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medical_appointments.index');
    }


    public function getMedicalAppointmentData()
    {

        $medical_appointments = DB::table('medical_appointments')
           ->join('patients', 'medical_appointments.patient_id', '=', 'patients.id')
           ->join('doctors', 'medical_appointments.doctor_id', '=', 'doctors.id')
           ->join('appointment_statuses', 'medical_appointments.appointment_status_id', '=', 'appointment_statuses.id')
           ->select('medical_appointments.id', 
            'medical_appointments.date',
            'medical_appointments.time',
            'patients.id',
            'doctors.id',
            'appointment_statuses.status_name'
        )->get();

        return datatables($medical_appointments)->toJson();

    }

    public function listarCitasPdf(){
        
        $citas = MedicalAppointment::all();
        view()->share('citas',$citas);
        $pdf = PDF::loadView('medical_appointments.reports.report_all');
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
        $doctores = Doctor::all();
        $estados_cita = AppointmentStatus::all();
        return view('medical_appointments.create', compact('pacientes','doctores','estados_cita'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicalAppointmentsFormRequest $request)
    {
        $medical_appointment = new MedicalAppointment();
        $medical_appointment->date = $request->date;
        $medical_appointment->time = $request->time;
        $medical_appointment->doctor_id = $request->doctor_id;
        $medical_appointment->patient_id = $request->patient_id;
        $medical_appointment->appointment_status_id = $request->appointment_status_id;
        $medical_appointment->save();

        //return redirect(url('/pacientes'))->with('satisfactorio', "El paciente $patient->first_name, $patient->last_name se creo correctamente");
        return redirect('/citas')->with('status', 'La Cita Medica se creo correctamente!');
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
        
        $medical_appointment = MedicalAppointment::find($id);
        $pacientes = Patient::all();
        $doctores = Doctor::all();
        $estados_cita = AppointmentStatus::all();
        return view('medical_appointments.edit', compact('pacientes','doctores','estados_cita', 'medical_appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicalAppointmentsFormRequest $request, MedicalAppointment $medical_appointment)
    {
        $medical_appointment->update(
            $request->only(
                [
                    'date', 
                    'time', 
                    'doctor_id', 
                    'patient_id', 
                    'appointment_status_id', 
                ]
            ));
            return redirect('/citas')->with('status', 'La Cita Medica se creo correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $medical_appointment->delete();
        return redirect('/citas')->with('status', 'La Cita Medica se elimino de forma permanente!');
    }
}
