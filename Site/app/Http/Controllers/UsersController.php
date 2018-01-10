<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use DB;
use Illuminate\Support\Facades\Input;
class UsersController extends Controller
{

  public function add(Request $request)
  {
    $this->validate($request,[
      'name'=>'required|max:20|string|regex:/^[A-Za-z\s-_]+$/',
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
          $product->name = $request->name;
          $product->price = $request->price;
          $product->save();
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
  public function show()
  {
    $products = DB::table('products')->get();
    return view('afterlog.products', compact('products'));
  }
  public function delete(Products $product)
  {
    $product->delete();
    return back();
  }
  public function edit(Products $product)
  {
    return view('afterlog.edit',compact('product'));
  }
  public function update(Request $request, Products $product)
  {
    $product->update($request->all());
    return redirect('home/products');;
  }
  public function search(Request $request)
  {
    $this->validate($request,[
      'name'=>'required|max:20|string|regex:/^[A-Za-z\s-_]+$/',
    ]);
    $product = DB::table('products')->where('name', $request->name)->first();
    //echo $fproduct;
    if($product){
      return view('afterlog.searchResult',compact('product'));
    }
    else {
      $product = new Products();
      $product->name = "sorry -_-  There is no product with this name: " . $request->name;
      return view('afterlog.searchResult',compact('product'));
    }
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
