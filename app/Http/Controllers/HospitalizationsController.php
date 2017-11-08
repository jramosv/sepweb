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
            'hospitalizations.output',
            'patients.last_name',            
            'rooms.name',
            'nurses.first_name',
            'procedures.reason'

        )->get();

        return datatables($hospitalizations)->toJson();

    }

    public function listarHospitalizacionesPdf(){
        
        $hospitalizations = Hospitalization::all();
        view()->share('hospitalizations',$hospitalizations);
        $pdf = PDF::loadView('hospitalizations.reports.report_all');
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
        return view('hospitalizations.create', compact('enfermeras','habitaciones','procedimientos','pacientes'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HospitalizationsFormRequest $request)
    {
        $hospitalizations = new Hospitalization();
        $hospitalizations->patient_id = $request->patient_id;
        $hospitalizations->nurse_id = $request->nurse_id;
        $hospitalizations->procedure_id = $request->procedure_id;
        $hospitalizations->room_id = $request->room_id;
        $hospitalizations->input = $request->input;
        $hospitalizations->output = $request->output;
        
        $hospitalizations->save();
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
        $hospitalization = Hospitalization::find($id);
        $pacientes = Patient::all();
        $enfermeras = Nurse::all();
        $habitaciones = Room::all();
        $procedimientos = Procedure::all();
        return view('hospitalizations.edit', compact('hospitalization','habitaciones','enfermeras','pacientes','procedimientos'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HospitalizationsFormRequest $request, Hospitalization  $hospitalization)
    {
        $hospitalization->update(
            $request->only(
                [
                    'input',
                    'output',
                    'nurse_id',
                    'patient_id',
                    'room_id', 
                    'procedure_id',
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
    public function destroy(Hospitalization $hospitalization)
    {
       
        $hospitalization->delete();
        return redirect('/hospitalizaciones')->with('status', 'La enfermera se elimino de forma permanente!');
      
    }
}
