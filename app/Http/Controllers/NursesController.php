<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use App\Nurse;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Http\Requests\NursesFormRequest;

class NursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nurses = Nurse::paginate(5);
        return view('nurses.index', compact('nurses'));

        //
    }

    public function getNursesData()
    {

        $nurses = DB::table('nurses')
        //    ->join('blood_types', 'patients.blood_types_id', '=', 'blood_types.id')
           ->select('nurses.id', 
            'nurses.first_name',
            'nurses.last_name',
            'nurses.phone',
            'nurses.address'
        )->get();

        return datatables($nurses)->toJson();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nurses.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NursesFormRequest $request)
    {
        $nurse = new Nurse();
        $nurse->first_name = $request->first_name;
        $nurse->last_name = $request->last_name;
        $nurse->phone = $request->phone;
        $nurse->address = $request->address;
        $nurse->save();
        return redirect('/enfermeras')->with('status', 'El registro se creo correctamente!');
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
        $nurse = Nurse::find($id);
        return view('nurses.edit', compact('nurse'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NursesFormRequest $request, Nurse $nurse)
    {
        $nurse->update(
            $request->only(
                [
                    'first_name', 
                    'last_name', 
                    'address', 
                    'phone',
                ]
            ));
        return redirect('/enfermeras')->with('status', 'La Enfermera se actualizo correctamente!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        $nurse->delete();
        return redirect('/enfermeras')->with('status', 'La enfermera se elimino de forma permanente!');
        //
    }
}
