<?php

namespace App\Http\Controllers;
use App\Specialty;
use Illuminate\Http\Request;
use App\Http\Requests\SpecialtiesFormRequest;

class SpecialtiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialties.create');
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
        $specialty = new Specialty();
        $specialty->name = $request->name;
        $specialty->save();
        return redirect('/especialidades')->with('status', 'El registro se creo correctamente!');
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
        
        $specialty = Specialty::find($id);
        return view('specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtiesFormRequest $request, Specialty $specialty)
    {
        $specialty->update(
            $request->only(
                [
                    'name', 
                ]
            ));
        return redirect('/especialidades')->with('status', 'La Especialidad se actualizo correctamente!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        $specialty->delete();
        return redirect('/especialidades')->with('status', 'La especialidad se elimino de forma permanente!');
        //
    }
}
