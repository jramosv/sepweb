<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;

use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::where('isActive', '=', 1)->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->stock = $request->stock;
        $product->barcode = $request->barcode;
        $product->min_amount = $request->min_amount;
        $product->max_amount = $request->max_amount;
        $product->due_date = $request->due_date;
        $product->isActive = $request->isActive;
        $product->save();

        return redirect('/productos')->with('status', 'El producto creado correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::All();
        $product = Product::find($id);
        return view('products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update(
            $request->only(
                [
                    'barcode', 
                    'name', 
                    'description', 
                    'category_id', 
                    'stock', 
                    'min_amount',
                    'max_amount',
                    'due_date',
                    'isActive',
                ]
            ));
        return redirect('/productos')->with('status', 'El producto se actualizo correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->isActive = 0;
        $product->update();
        return redirect('/productos')->with('status', 'El producto se elimino de forma permanente!');
    }
}
