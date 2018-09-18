@extends('layouts.admin')

@section('content')

<h1>Create Users</h1>
{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store']) !!}
<div class="form-group">
  <label for="">Name:</label>
  <input type="text" class="form-control" name="name" id="userName" placeholder="">
</div>
<div class="form-group">
  <label for="">Email:</label>
  <input type="text" class="form-control" name="email" id="userEmail" placeholder="">
</div>
<div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
<div class="form-group">
  <label for="">Role:</label>
  <select class="form-control" name="role_id" id="userRoleId">
    @foreach ($roles as $role)
      <option value="{{ $role->id }}">{{ $role->name }}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="">Status:</label>
  <select class="form-control" name="is_active" id="userStatus">
    <option value="0">Not Active</option>
    <option value="1">Active</option>
  </select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}

@include('includes.form_error')
@endsection