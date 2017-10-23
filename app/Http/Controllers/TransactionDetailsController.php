<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransactionDetail;
use App\Http\Requests\TransactionDetailsFormRequest;
class TransactionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction_details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionDetailsFormRequest $request)
    {
        $transaction_detail = new TransactionDetail();
        $transaction_detail->nit = $request->nit;
        $transaction_detail->name = $request->name;
        $transaction_detail->phone = $request->phone;
        $transaction_detail->address = $request->address;
        $transaction_detail->save();
        return redirect('/detalletransacciones')->with('status', 'El registro se creo correctamente!');
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
        $transaction_detail = TransactionDetail::find($id);
        return view('transaction_details.edit', compact('transaction_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionDetailsFormRequest $request, TransactionDetail $transaction_detail)
    {
        $transaction_detail->update(
          $request->only(
              [
              'nit',
              'name',
              'phone',
              'address',
          ]
        ));
          
          return redirect('/detalletransacciones')->with('status','se registro bien');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetail $transaction_detail)
    {
        $transaction_detail->delete();
        return redirect('/detalletransacciones')->with('status', 'El Registro se elimino de forma permanente!');
    }
}
