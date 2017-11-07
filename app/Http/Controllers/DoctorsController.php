<?php

namespace App\Http\Controllers;
use App\Doctor;
use App\Specialty;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorsFormRequest;

class DoctorsController extends Controller
{   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
   
    {
        
        $doctors = Doctor::paginate(5);
        return view('doctors.index', compact('especialidades','doctors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidades = Specialty::all();
        return view('doctors.create', compact('especialidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorsFormRequest $request)
    {
        $doctor = new Doctor();

        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->speciality_id = $request->speciality_id;
        $doctor->save();
        return redirect('/doctores')->with('status', 'El doctor se creo correctamente!');
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
        $doctor = Doctor::find($id);
        $especialidades = Specialty::all();
        return view('doctors.edit', compact('especialidades', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorsFormRequest $request, Doctor $doctor)
    {
        $doctor->update(
            $request->only(
                [
                    'first_name', 
                    'last_name', 
                    'address', 
                    'phone',
                    'speciality_id'
                ]
            ));
        return redirect('/doctores')->with('status', 'El Doctor se actualizo correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect('/doctores')->with('status', 'El doctor se elimino de forma permanente!');
    }
}
