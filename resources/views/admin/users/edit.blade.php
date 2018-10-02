@extends('layouts.admin') 
@section('content')

<h1>Edit User</h1>
<div class="row">
  <div class="col-sm-9">
    {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
    <div class="form-group">
      {{ Form::label('name', 'Name:') }} {{ Form::text('name', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('email', 'Email:') }} {{ Form::email('email', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('role_id', 'Role:') }} {{ Form::select('role_id', $roles, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('is_active', 'Status') }} {{ Form::select('is_active', [1 => 'Active', 0 => 'Not Active'], null, ['class'
      => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('photo_id') }} {{ Form::file('photo_id', null, ['class' => 'form-control']) }}
    </div>
    <button type="submit" class="btn btn-primary">Submit</button> {!! Form::close() !!}
  </div>
  <div class="col-sm-3">
    <img src="{{ $user->photo? $user->photo->file: 'http://placehold.it/400x400' }}" alt="" class="img img-responsive img-rounded">
  </div>
</div>
  @include('includes.form_error')
@endsection