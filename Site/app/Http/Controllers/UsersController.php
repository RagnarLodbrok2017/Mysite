<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use DB;
class UsersController extends Controller
{
  public function add(Request $request)
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
  public function update(Request $request, Products $product)
  {
    $product->update($request->all());
    return redirect('../home');;
  }
}
