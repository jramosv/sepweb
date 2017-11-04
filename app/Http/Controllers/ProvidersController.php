<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProviderFormRequest;
use App\Provider;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();
        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderFormRequest $request)
    {
        $provider = new Provider();
        $provider->nit = $request->nit ;
        $provider->tradename = $request->tradename ;
        $provider->commercial_address = $request->commercial_address ;
        $provider->email = $request->email ;
        $provider->phone = $request->phone ;
        $provider->contact_name = $request->contact_name ;
        $provider->contact_address = $request->contact_address ;
        $provider->contact_phone = $request->contact_phone ;
        $provider->contact_email = $request->contact_email ;
        $provider->save();
        
        return redirect('/proveedores')->with('status', 'Proveedor creado correctamente!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);
        return view('providers.edit', compact('provider'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderFormRequest $request, Provider $provider)
    {
        $provider->update(
            $request->only([
                'nit', 
                'tradename', 
                'commercial_address', 
                'email', 
                'phone', 
                'contact_name', 
                'contact_address', 
                'contact_phone', 
                'contact_email',
            ])
        );

        return redirect('/proveedores')->with('status', 'El proveedor se actualizo correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect('/proveedores')->with('status', 'El proveedor se elimino de forma permanente!');
    }
}
