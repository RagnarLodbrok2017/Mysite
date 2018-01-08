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
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><a href="products/{{$product->id}}/delete" type="button" class="btn btn-danger">Delete</a></td>
                <form action="products/{{$product->id}}/update" method="POST">
                  {{csrf_field()}}
                  <div class="input-group">
                    <td><input class="form-control" type="text" name="name" value="{{$product->name}}"></td>
                    <td><input class="form-control" type="text" name="price" value="{{$product->price}}"></td>
                    <td><span class="input-group-btn">
                      <button class="btn btn-default" type="submit">update</button>
                    </span></td>
                  </div>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <br><br><br><br>
    <div class="text-center">
      <td><a href="#" type="button" class="btn btn-primary">Search</a></td>
      <br><br>
        <form action="products/add" method="POST">
          {{csrf_field()}}
          <div class="input-group col-xs-6">
          <input class="form-control" type="text" name="name" value="" placeholder="Name of Product:">
          <input class="form-control" type="text" name="price" value="" placeholder="price of Product:">
          <span class="input-group-btn col-xs-6">
				<button class="btn btn-default" type="submit">Add Product</button>
			</span>
        </div>
        </form>
    </div>
</div>
@endsection
