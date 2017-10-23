<?php

namespace App\Http\Controllers;
use App\Hospitalization;
use App\Patient;
use App\Room;
use App\Nurse;
use App\Procedure;


use Illuminate\Http\Request;

class HospitalizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitalizations = Hospitalization::paginate(5);
        return view('hospitalizations.index', compact('hospitalizations','rooms','nurses','patients','procedures'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Patient::all();
        $enfermeras = Nurse::all();
        $habitaciones = Room::all();
        $procedimientos = Procedure::all();
        return view('hospitalizations.create', compact('especialidades','enfermeras','habitaciones','procedimientos','pacientes'));
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
