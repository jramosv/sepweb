<?php

namespace App\Http\Controllers;

use App\Patient;
use App\BloodType;
use Illuminate\Http\Request;
use App\Http\Requests\PatientsFormRequest;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $patients = Patient::paginate(5);
        return view('patients.index', compact('tipos_sangre', 'patients'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_sangre = BloodType::all();
        return view('patients.create', compact('tipos_sangre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientsFormRequest $request)
    {
        $patient = new Patient();
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->date_birth = $request->date_birth;
        $patient->sex = $request->sex;
        $patient->email = $request->email;
        $patient->blood_types_id = $request->blood_types_id;
        $patient->save();

        //return redirect(url('/pacientes'))->with('satisfactorio', "El paciente $patient->first_name, $patient->last_name se creo correctamente");
        return redirect('/pacientes')->with('status', 'El paciente se creo correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        $tipos_sangre = BloodType::all();
        return view('patients.edit', compact('tipos_sangre', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientsFormRequest $request, Patient $patient)
    {
        $patient->update(
            $request->only(
                [
                    'first_name', 
                    'last_name', 
                    'address', 
                    'phone', 
                    'date_birth', 
                    'sex',
                    'email',
                    'blood_types_id',
                ]
            ));
        return redirect('/pacientes')->with('status', 'El paciente se actualizo correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/pacientes')->with('status', 'El paciente se elimino de forma permanente!');
    }
}
