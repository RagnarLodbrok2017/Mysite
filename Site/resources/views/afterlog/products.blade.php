@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><a href="products/{{$product->id}}/delete" type="button" class="btn btn-danger">Delete</a></td>
                <td><a href="products/{{$product->id}}/edit" type="button" class="btn btn-default">Edit</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
  </br>
    <div class="text-center col-xs-12">
        <form class="form-horizontal col-xs-6" action="products/add" method="POST">
          {{csrf_field()}}
          <div class="input-group">
            <div class="col-xs-7">
          <input class="form-control" type="text" name="name" value="" placeholder="Name of Product:">
          <input class="form-control" type="text" name="price" value="" placeholder="price of Product:">
        </div>
        <div class="col-xs-5">
          <span class="input-group-btn">
				<button class="btn btn-success" type="submit">Add Product</button>
			</span>
    </div>
        </div>
        </form>
        <form class="col-xs-6" action="products/{{$product->name}}/edit" method="GET">
          {{csrf_field()}}
          <div class="input-group">
            <div class="col-xs-10">
          <input class="form-control" type="text" name="name" value="" placeholder="Name of Product:">
        </div>
        <div class="col-xs-2">
          <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Search</button>
			</span>
    </div>
        </div>
        </form>
    </div>
</div>
@endsection
