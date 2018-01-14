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
                <th scope="col">Image</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td><img src = {{ asset("uploads/$product->image") }} alt="" class="img-rounded thumbnai center-block" style="width:80px;hight:80px;"></td>
                <td><a href="products/{{$product->id}}/delete" type="button" class="btn btn-danger">Delete</a></td>
                <td><a href="products/{{$product->id}}/edit" type="button" class="btn btn-default">Edit</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="row text-center">
          {{ $products->render() }}
        </div>
    </div>
  </br>
    <div class="text-center col-xs-12">
        <form class="form-horizontal col-xs-8" action="products/add" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="input-group col-xs-6">
            <div>
              <div class="form-group">
                <input class="form-control" type="text" name="name" value="" placeholder="Name of Product:">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" name="price" value="" placeholder="price of Product:">
              </div>
              <div class="form-group">
                <label for="img">Select image to Upload: </label>
                <input class="form-control" type="file" name="image" id ="image" value="">
                <input type="hidden" value="{{ csrf_token()}}" name="_token">
              </div>
              <div class="form-group">
                <label for="document">Select Documentation to Upload Must be in type (txt): </label>
                <input class="form-control" type="file" name="doc" id ="doc" value="">
                <input type="hidden" value="{{ csrf_token()}}" name="_token">
              </div>
              <div class="form-group">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('price') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('image') }}</strong>
                    </span>
                @endif
              </div>
              <div class="form-group">
                @if ($errors->has('doc'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('doc') }}</strong>
                    </span>
                @endif
              </div>
        </div>
        <div>
          <div class="form-group">
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit">Add Product</button>
            </span>
          </div>
    </div>
        </div>
        </form>
        <form class="col-xs-4" action="products/searchResult" method="POST">
          {{csrf_field()}}
          <div class="input-group">
            <div class="col-xs-10">
          <input class="form-control" type="text" name="name" placeholder="Name of Product:">
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong class="alert alert-danger">{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="col-xs-2">
          <span class="input-group-btn">
        <button class="btn btn-primary" type="submit">Search</button>
			</span>
    </div>
        </div>
        </form>
    </div>
    <div class="text-center" style="margin-top:120px;">
      <a href="/" class="btn btn-warning btn-lg">Back</a>
    </div>
</div>
@endsection
