<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductLike;
use App\ProductPhoto;
use Redirect;
use Illuminate\Contracts\Validation\Validator;

class ProductsControllers extends Controller
{
    /**
   * Display a listing of the resource.
   *
   * @return Response
   */
   public function index(){
    $products = Product::all();
    return View('products.index', compact('products'));
  }

 /**
  * Show the form for creating a new resource.
  *
  * @return Response
  */
 public function create()
 {
   return view('dashboard.products');
 }

 /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */
 public function store(Request $request)
 {

   $attributes = $request->except('image_ids');
 
   $photos_id = explode(" ",$request->get('image_ids'));

   $product = Product::create($attributes);

   foreach ($photos_id as $photo_id) {
     $product_photo = new ProductPhoto();
     $product_photo->product_id = $product->id;
     $product_photo->photo_id = $photo_id;
     $product_photo->save();
   }
   
   return Redirect::back()->with('success', 'product Created Successfully!');
 }

 /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
 public function show($id)
 {
   $product = Product::findOrFail($id);
   return view('product.single', compact('product')); 
 }

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
 public function edit($id)
 {
   
 }

 /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */
 public function update($id)
 {
   
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
 public function destroy($id)
 {
   
 }
 public function productLike(Request $request){
  try{
    $product = Product::where('p_id', $request->get('p_id'))->first();
  
    $like = new ProductLike();
    $like->product_id = $product->id;
    $like->session_id = $request->get('session_id');
    $like->like = 1;
    $like->save();

    return response()->json(array(
      'status'=> 'success', 
      'code'=>200,
      'message' => "Liked successfully",
      'data' => array('p_id' => $request->get('p_id'))
    ));
  }catch(Exception $e){
    return response()->json(array(
      'status'=> 'failed', 
      'code'=>500, 
      'message'=> $e->getMessage()
    ));                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
  }catch(Illuminate\Database\QueryException $query){
    $errorCode = $e->errorInfo[1];
    if($errorCode == 1062){
      return response()->json(array(
        'status'=> 'failed', 
        'code'=>500, 
        'message'=> 'duplicate entry'
      ));
    }
    
  }
}

}

?>