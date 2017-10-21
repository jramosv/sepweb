<?php

namespace App\Http\Controllers;
use App\Room;
use App\Http\Requests\RoomsFormRequest;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(5);
        return view('rooms.index', compact('rooms'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rooms.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomsFormRequest $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->bed = $request->bed;
        $room->save();

        //return redirect(url('/pacientes'))->with('satisfactorio', "El paciente $patient->first_name, $patient->last_name se creo correctamente");
        return redirect('/habitaciones')->with('status', 'La habitacion se creo correctamente!');
    
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
        $rooms = Room::find($id);
        
        return view('rooms.edit', compact('rooms'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomsFormRequest $request, Room $room)
    {
        
        $room->update(
            $request->only(
                [
                    'name', 
                    'bed', 
                ]
            ));
        return redirect('/habitaciones')->with('status', 'La habitacion se actualizo correctamente!');
    }
        //
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('/habitaciones')->with('status', 'La habitacion se elimino de forma permanente!');
        //
    }
}
