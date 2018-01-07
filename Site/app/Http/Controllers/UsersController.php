<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use DB;
class UsersController extends Controller
{
  public function show()
  {
    $products = DB::table('products')->get();
    return view('afterlog.products', compact('products'));
  }
}
