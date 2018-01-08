@extends('layouts.app')

@section('content')
<div class="container">
<form action="update" method="POST">
  {{csrf_field()}}
  <div class="input-group">
    <input class="form-control" type="text" name="name" value="{{$product->name}}">
    <input class="form-control" type="text" name="price" value="{{$product->price}}">
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit">update</button>
    </span>
  </div>
</form>
</div>
@endsection
