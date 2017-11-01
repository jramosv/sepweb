<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Hospitalization;
use App\Patient;
use App\Room;
use App\Nurse;
use App\Procedure;
use Yajra\Datatables\Datatables;
use App\Http\Requests\HospitalizationsFormRequest;
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
        return view('hospitalizations.index');
        //
    }
    
    public function getHospitalizationData()
    {

        $hospitalizations = DB::table('hospitalizations')
           ->join('rooms', 'hospitalizations.room_id', '=', 'rooms.id')
           ->join('procedures', 'hospitalizations.procedure_id', '=', 'procedures.id')
           ->join('nurses', 'hospitalizations.nurse_id', '=', 'nurses.id')
           ->join('patients', 'hospitalizations.patient_id', '=', 'patients.id')           
           ->select('hospitalizations.id', 
            'hospitalizations.input',
            'patients.last_name',            
            'rooms.name',
            'nurses.firts_name',
            'procedures.reason'

        )->get();

        return datatables($hospitalization)->toJson();

    }

    public function listarHospitalizacionesPdf(){
        
        $hospitalizations = hospitalization::all();
        view()->share('hospitalizaciones',$hospitalizaciones);
        $pdf = PDF::loadView('hospitalization.reports.report_all');
        return $pdf->download('hospitalization.pdf');
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
    public function store(HospitalizationsFormRequest $request)
    {
        $hospitalization = new Hospitalization();
        $hospitalization->patient_id = $request->patient_id;
        $hospitalization->nurse_id = $request->nurse_id;
        $hospitalization->procedure_id = $request->procedure_id;
        $hospitalization->room_id = $request->room_id;
        $hospitalization->input = $request->input;
        $hospitalization->output = $request->output;
        
        $hospitalization->save();
        return redirect('/hospitalizaciones')->with('status', 'El registro se creo correctamente!');
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
        $hospitalzations = Hospitalization::find($id);
        $pacientes = Patient::all();
        $enfermeras = Nurse::all();
        $habitaciones = Room::all();
        $procedimientos = Procedure::all();
        return view('hospitalizations.edit', compact('hospitalizations','habitaciones','enfermeras','pacientes','Procedimientps'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HosptitalizationsFormRequest $request, Hospitalization  $hospitalization)
    {
        $patient->update(
            $request->only(
                [
                    'input',
                    'output',
                    'nurse_id',
                    'patient_id',
                    'room_id', 
                    'procedures_id',
                ]
            ));
        return redirect('/hospitalizaciones')->with('status', 'La Hospitalizacion se actualizo correctamente!');
    
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
