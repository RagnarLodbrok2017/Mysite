<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use DB;
use File;
use App\Supplier;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{

  public function add(Request $request)
  {
    $this->validate($request,[
      'name'=>'required|max:20|string|regex:/^[A-Za-z\s-_]+$/',
      'price'=>'required|max:1000|integer|numeric',
      'image' => 'required | mimes:jpeg,png,jpg | max:10000',
      'doc' => 'mimes:txt, | max:1000',
      'price'=>'required|max:1000|integer|numeric',
    ]);
    $product = DB::table('products')->where('name', $request->name)->first();
    //$products = DB::table('products')->get();
    //foreach ($products as $product) {
      if(!$product)
      {
        $product = new Products();
        if(is_string($request->name) &&  is_numeric($request->price))
        {
          $supplier = Supplier::find($request->supplier);
          if($supplier)
          {
            if(Input::hasFile('image')){
              $imagePro = Input::file('image');
              $imageName = $request->name . '.' .$imagePro->getClientOriginalExtension();
              $imagePro->move('uploads/',$imageName);
            }
            if(Input::hasFile('doc')){
              $doc = input::file('doc');
              $docName = $request->name . '.' .$doc->getClientOriginalExtension();
              $doc->move(public_path('uploads/'), $docName);
              $product->document = $docName;
            }
            $product->supplier_id = $request->supplier;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->image = $imageName;
            $product->save();
          }
          return back();
      }
      else {
        return redirect('home/products');
      }
    }
    else {
      return redirect('home/products');
    }
  }

  //function Show
  public function show()
  {
    $products = Products::paginate(6);
    $suppliers = Supplier::get();
    return view('afterlog.products', compact('products','suppliers'));
  }
  public function delete(Products $product)
  {
    $product->delete();
    return back();
  }
  public function edit(Products $product)
  {
    $suppliers = Supplier::get();
    return view('afterlog.edit',compact('product','suppliers'));
  }

  //function update
  public function update(Request $request, Products $product)
  {
    $this->validate($request,[
      'name'=>'required|max:20|string|regex:/^[A-Za-z\s-_]+$/',
      'price'=>'required|max:1000|integer|numeric',
      'image' => 'max:1000 | mimes:jpeg,png,jpg',
    ]);
    if(Input::hasFile('image')){
      $imagePro = Input::file('image');
      $imageName = $request->name . '.' . $imagePro->getClientOriginalExtension();
      $imagePro->move('uploads/',$imageName);
    }else {
      $imagechars = explode(".",$product->image);
      $i = 0;
      foreach ($imagechars as $imagechar) {
        if($imagechar == 'jpg' || $imagechar == 'jpeg' || $imagechar == 'png'){
          $extension = $imagechars[$i];
        }
        $i++;
      }
      $imageNewName = "$request->name.$extension";
      File::move("uploads/$product->image", "uploads/$imageNewName");
      $product->image = $imageNewName;
    }
    $product->supplier_id = $request->supplier;
    $product->update($request->all());
    return redirect('home/products');
  }

  //search function
  public function search(Request $request)
  {
    $this->validate($request,[
      'name'=>'required|max:20|string|regex:/^[A-Za-z\s-_]+$/',
    ]);
    $product = Products::where('name', $request->name)->first();
    //echo $fproduct;
    if(!$product){
      $product = new Products();
      $product->name = "sorry (-_-) There is no product with this name: " . $request->name;
    }
    return view('afterlog.searchResult',compact('product'));
  }
  /*public function search(Request $request)
  {
    $name = Input::get ( 'name' );
    $product = Products::where('name','LIKE','%'.$name.'%');
    if($product)
    {
      return view('afterlog.edit')->withDetails($product)->withQuery ( $name );
    }
    else return view ('afterlog.edit')->withMessage('No Details found. Try to search again !');
  }*/

}
