@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">User name</th>
                <th scope="col">User Email</th>
                <th scope="col">User Password</th>
                <th class="text-center" scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($users))
              @foreach ($users as $user)
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td><a href="adminhome/{{$user->id}}/delete" type="button" class="btn btn-danger">Delete</a></td>
                <td><a href="products/{{$user->id}}/update" type="button" class="btn btn-default">Edit</a></td>
              </tr>
              @endforeach
              @else
              <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
    </div>
  </br>
  @if(isset($users))
  <div class="text-center col-xs-12">
      <form class="form-horizontal col-xs-6" action="adminhome/add" method="POST">
        {{csrf_field()}}
        <div class="input-group">
          <div class="col-xs-12">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-xs-8">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-xs-8">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-xs-8">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
      </div>
      <div class="col-xs-12">
        <span class="input-group-btn">
      <button class="btn btn-success" type="submit">Add User</button>
    </span>
  </div>
      </div>
      </form>
      <form class="form-horizontal col-xs-6" action="adminhome/update" method="POST">
        {{csrf_field()}}
        <div class="input-group">
          <div class="col-xs-12">
            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                <label for="id" class="col-md-4 control-label">ID</label>

                <div class="col-xs-8">
                    <input id="id" type="number" class="form-control" name="id" value="{{$user->id}}" required autofocus>

                    @if ($errors->has('id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-xs-8">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-xs-8">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-xs-8">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
      </div>
      <div class="col-xs-12">
        <span class="input-group-btn">
      <button class="btn btn-info" type="submit">update User</button>
    </span>
  </div>
      </div>
      </form>
  </div>
</div>
  @endif
  <div class="text-center" style="margin-top:40px;">
    <button class="btn btn-warning" onclick="showandhide()">Search</button>
    <div id="formSearch">
      <br>
      {!! Form::open(["url"=>"adminhome/search"]) !!}
      <label for="id">Enter the ID</label>
      {!! Form::search("id") !!}
      {!! Form::submit('done', ['class' => 'btn btn-warning'] )!!}
      @if(isset($user))
      {!! Form::label('id', $user->name) !!}
      @endif
    </div>
  </div>
  <div class="text-center" style="margin-top:60px;">
    <a href="/adminhome" class="btn btn-danger btn-lg">Back</a>
  </div>
</div>
<script>
function showandhide() {
    var x = document.getElementById("formSearch");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
@endsection
