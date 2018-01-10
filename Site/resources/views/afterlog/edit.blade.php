@extends('layouts.app')

@section('content')
<div class="container">
  <div class="text-center">
    <form class="form-horizontal col-md-4 col-md-offset-4 centered" action="update" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label for="id">ID: </label>
        <label for="id" value="{{$product->id}}" for="">{{$product->id}}</label>
      </div>
      <div class="form-group">
        <label for="">Name: </label>
        <input class="form-control" type="text" name="name" value="{{$product->name}}">
      </div>
      <div class="form-group">
        <label for="">Price: </label>
          <input class="form-control" type="text" name="price" value="{{$product->price}}">
      </div>
      <div class="form-group">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">update</button>
          </span>
      </div>
    </form>
  </div>
  <div class="col-xs-12 text-center" style="margin-top:50px;">
    <code>the Old Product Results:</code>
    <h2>{{$product->id}}</h2>
    <h2>{{$product->name}}</h2>
    <h2>{{$product->price}}</h2>
  </div>
</div>
@endsection
