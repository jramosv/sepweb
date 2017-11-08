<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseFormRequest;
use App\Purchase;
use App\PurchaseDetail;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchases.index');
            //->select('pu.id', 'pu.date', 'pr.tradename', 'pu.document_type', 'pu.document_serie', 'pu.document_no', 'pu.isActive', DB::raw('sum(pd.quantity * pd.purchase_price) as total'))
            // ->orderBy('pu.id','desc')
            // ->groupBy('pu.id', 'pu.date', 'pr.tradename', 'pu.document_type', 'pu.document_serie', 'pu.document_no', 'pu.isActive')->get();
            // return view('purchases.index', [ "purchases" => $purchases ]);

    }

    public function getPurchaseData()
{
            $purchases = DB::table('purchases as pu')
            ->join('providers as pr','pu.provider_id','=','pr.id')
            ->join('purchase_details as pd','pu.id','=','pd.id')
            ->select('pu.id', 
            'pu.date',
            'pr.tradename',
            'pu.document_type',
            'pu.document_serie',
            'pu.document_no',
            'pu.isActive'
        )->get();

        return datatables($purchases)->toJson();
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers=DB::table('providers')->get();
        $products = DB::table('products as pr')
            ->select(DB::raw('CONCAT(pr.barcode, " ", pr.name) AS product'), 'pr.id')
            ->where('pr.isActive','=','1')
            ->get();
        return view("purchases.create", ["providers" => $providers, "products" => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseFormRequest $request)
    {
         try{

             DB::beginTransaction();

             $purchase=new Purchase;
             $purchase->provider_id = $request->get('provider_id');
             $purchase->document_type = $request->get('document_type');
             $purchase->document_serie = $request->get('document_serie');
             $purchase->document_no = $request->get('document_no');
             
             $mytime = Carbon::now('America/Guatemala');
             $purchase->date = $mytime->toDateTimeString();
             $purchase->isActive = '1';
             $purchase->save();

             $product_id = $request->get('product_id');
             $quantity = $request->get('quantity');
             $purchase_price = $request->get('purchase_price');
             $sale_price = $request->get('sale_price');

             $cont = 0;

             while($cont < count($product_id)){
                 $detalle = new PurchaseDetail();
                 $detalle->purchase_id = $purchase->id; 
                 $detalle->product_id = $product_id[$cont];
                 $detalle->quantity = $quantity[$cont];
                 $detalle->purchase_price = $purchase_price[$cont];
                 $detalle->sale_price = $sale_price[$cont];
                 $detalle->save();
                 $cont = $cont + 1;            
             }

             DB::commit();

        }catch(\Exception $e)
        {
           DB::rollback();
        }

        return redirect('/compras')->with('status', 'Compra registrada de forma correcta!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = DB::table('purchase as pu')
            ->join('providers as p','pu.provider_id','=','p.id')
            ->join('purchase_details as pd','pu.id','=','pd.purchase_id')
            ->select('pu.id', 'pu.date', 'p.tradename', 'pu.document_type', 'pu.document_serie', 'pu.document_no', 'pu.isActive', DB::raw('sum(pd.quantity * purchase_price) as total'))
            ->where('pu.id', '=', $id)
            ->first();

        $purchase_details = DB::table('purchase_details as pd')
             ->join('products as pr','pd.product_id','=','pr.id')
             ->select('pr.name as product','pd.quantity','pd.purchase_price','pd.sale_price')
             ->where('pd.id','=',$id)
             ->get();

        return view("purchases.show",["purchase" => $purchase, "purchase_details" => $purchase_details]);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->isActive='0';
        $purchase->update();
        return redirect('/compras')->with('status', 'Compra anulada de forma correcta!');
    }
}
