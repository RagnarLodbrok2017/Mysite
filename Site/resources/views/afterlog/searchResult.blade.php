@extends('layouts.app')

@section('content')
  <div class="container" style="font-size:28px;">
    <h1 class="text-center"><code>The Searh Result:</code></h1>
    <br/><br/>
      <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price }}</td>
                  <td><img src = {{ asset("uploads/$product->name.jpg") }} alt="" class="img-rounded thumbnai center-block" style="width:120px;hight:120px;"></td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      <div class="text-center" style="margin-top:120px;">
        <a href="/home/products" class="btn btn-warning btn-lg">Back</a>
      </div>
</div>
@endsection
