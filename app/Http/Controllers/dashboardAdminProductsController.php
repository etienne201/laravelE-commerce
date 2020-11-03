<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\productAccessory;
use App\productPhoto;
Use Redirect;
use Validator;

class dashboardAdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate $request prior to storing in db
        $request->validate([
            'product_name' => 'required|string|max:30',
            'brand' => 'required|string|max:30',
            'manufacturing_country' => 'required|string|max:30',
            'product_desc' => 'required|string|max:300',
            'product_rom' => 'required|string|max:6',
            'product_ram' => 'required|string|max:6',
            'product_cpu' => 'required|string|max:50',
            'gpu' => 'required|string|max:50',
            'operating_sys' => 'required|string|max:30',
            'front_cam' => 'required|string|max:10',
            'back_cam' => 'required|string|max:10',
            'phone_status' => 'required|string|max:30',
            'guaranty_months' => 'required|integer|max:3011',
            'supplier' => 'string',
            'supplier_pr' => 'required|integer',
            'seller_pr' => 'required|integer',
            
            'accessories' => 'required',
            'media' => 'required',
            'colors' => 'required',
        ]);

        $attributes = $request->all();

        $attributes['accessories'] = collect($attributes['accessories'])->implode(',');
        $attributes['media'] = collect($attributes['media'])->implode(',');
        $attributes['colors'] = collect($attributes['colors'])->implode(',');

         
        // Get form data from 

        Product::create($attributes);



        return redirect(route('products.index'));
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
