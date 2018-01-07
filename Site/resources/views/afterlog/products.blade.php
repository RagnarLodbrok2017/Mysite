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
                <td><a href="#" type="button" class="btn btn-danger">Delete</a></td>
                <td><a href="#" type="button" class="btn btn-default">Update</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    <br><br><br><br>
    <div class="text-center">
      <td><a href="#" type="button" class="btn btn-primary">Search</a></td>
      <td><a href="#" type="button" class="btn btn-success">Add Product</a></td>
    </div>
</div>
@endsection
