<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleFormRequest;
use App\Sale;
use App\SaleDetail;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = DB::table('sales as sa')
            ->join('patients as pt','sa.patient_id','=','pt.id')
            ->join('sale_details as sd','sa.id','=','sd.sale_id')
            ->select('sa.id', 'sa.date', DB::raw('CONCAT(pt.first_name, " ", pt.last_name) AS patient'), 'sa.document_type', 'sa.document_serie', 'sa.document_no', 'sa.isActive', 'sa.total')
            ->orderBy('sa.id','desc')
            ->groupBy('sa.id')->get();
            return view('recipes.index', [ "recipes" => $recipes ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients=DB::table('patients')
            ->get();
        $products = DB::table('products as pr')
            ->join('purchase_details as pd','pr.id','=','pd.product_id')
            ->select(DB::raw('CONCAT(pr.barcode, " ", pr.name) AS product'), 'pr.id', 'pr.stock', DB::raw('AVG(pd.sale_price) AS avg_price'))
            ->where('pr.isActive','=','1')
            ->where('pr.stock','>','0')
            ->groupBy('pr.id')
            ->get();
        return view("recipes.create", ["patients" => $patients, "products" => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleFormRequest $request)
    {
         try{

             DB::beginTransaction();

             $sale=new Sale;
             $sale->patient_id = $request->get('patient_id');
             $sale->document_type = $request->get('document_type');
             $sale->document_serie = $request->get('document_serie');
             $sale->document_no = $request->get('document_no');
             $sale->total = $request->get('total');
             
             $mytime = Carbon::now('America/Guatemala');
             $sale->date = $mytime->toDateTimeString();
             $sale->isActive = '1';
             $sale->save();

             $product_id = $request->get('product_id');
             $quantity = $request->get('quantity');
             $discount = $request->get('discount');
             $sale_price = $request->get('sale_price');

             $cont = 0;

             while($cont < count($product_id)){
                 $detalle = new SaleDetail();
                 $detalle->sale_id = $sale->id; 
                 $detalle->product_id = $product_id[$cont];
                 $detalle->quantity = $quantity[$cont];
                 $detalle->discount = $discount[$cont];
                 $detalle->sale_price = $sale_price[$cont];
                 $detalle->save();
                 $cont = $cont + 1;            
             }

             DB::commit();

        }catch(\Exception $e)
        {
           DB::rollback();
        }

        return redirect('/recetas')->with('status', 'Receta registrada de forma correcta!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = DB::table('sales as sa')
            ->join('patients as p','sa.patient_id','=','p.id')
            ->join('sale_details as sd','sa.id','=','sd.sale_id')
            ->select('sa.id', 'sa.date', DB::raw('CONCAT(p.first_name, " ", p.last_name) AS patient'), 'sa.document_type', 'sa.document_serie', 'sa.document_no', 'sa.isActive', 'total')
            ->where('sa.id', '=', $id)
            ->groupBy('sa.id')
            ->first();

        $sale_details = DB::table('sale_details as sd')
             ->join('products as pr','sd.product_id','=','pr.id')
             ->select('pr.name as product','sd.quantity','sd.discount','sd.sale_price')
             ->where('sd.sale_id','=',$id)
             ->get();

        return view("recipes.show",["sale" => $sale, "sale_details" => $sale_details]);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($recipe)
    {
        $sale = Sale::findOrFail($recipe);
        $sale->isActive='0';
        $sale->update();
        return redirect('/recetas')->with('status', 'Receta anulada de forma correcta!');
    }
}
