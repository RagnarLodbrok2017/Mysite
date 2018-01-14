@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-center">
    <div class="col-xs-12 text-center" style="margin-top:10px;">
      <code style="font-size:20px">the Old Product Results:</code>
      <h3>ID: {{$product->id}}</h3>
      <h3>Name: {{$product->name}}</h3>
      <h3>Price: {{$product->price}}</h3>
      <h3>Supplier ID: {{$product->supplier_id}}</h3>
      <h3>Supplier Name: {{$product->supplier->name}}</h3>
      <h3>Image: <img src = {{ asset("uploads/$product->image") }} alt="" class="img-rounded thumbnai center-block" style="width:100px;hight:100px;"></h3>
    </div>
    <form class="form-horizontal col-md-4 col-md-offset-4 centered" action="update" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label for="">Name: </label>
        <input class="form-control" type="text" name="name" value="{{$product->name}}">
      </div>
      <div class="form-group">
        <label for="">Price: </label>
          <input class="form-control" type="text" name="price" value="{{$product->price}}">
      </div>
      <div class="form-group">
        <label for="">Supplier ID: </label>
        <div class="row">
          <div class="col-sm-3">
            <select name="supplier" class="form-control">
              @if(isset($suppliers))
              @foreach($suppliers as $supplier)
              <option value="{{$supplier->id}}">{{$supplier->id}}</option>
              @endforeach
              @endif
            </select>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="img">Select image to Upload: </label>
        <input class="form-control" type="file" name="image" id ="image" value="">
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
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">update</button>
          </span>
      </div>
    </form>
  </div>
</div>
@endsection
