<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Redirect;
use Illuminate\Contracts\Validation\Validator;


class PhotosControllers extends Controller
{  public function index()
    {
      $images = Photo::all();
      return view('photos.index', compact('images'));
    }
    public function creat()
  {
    return view('photos.photo');
  }
   
  public function store(Request $request)
  {
    $request->validate([
        'product_name' => 'required|string|max:120',
        'color' => 'required',
        'alt' => 'required',
        'url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        
    ]);
    try{
      $ext = $request->url->getClientOriginalExtension();
      $uid = uniqid();
      $finalname = $uid.'_'.$request->product_name.'.'.$ext;
      $image = $request->url->move(public_path('uploads'), str_replace(" ","_",$finalname));
      $image_path = 'uploads/'.str_replace(" ","_",$finalname);
    
      $photo = new Photo;
      $photo->product_name = $request->product_name;
      $photo->color = $request->color;
      $photo->url = $image_path;
      $photo->alt = $request->alt;
      $photo->save();

      return Redirect::back()->with('success', 'Photo Created Successfully!');
    }catch(Exception $e){
      return Redirect::back()->with('errors', $e->getMessage());
    }

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
