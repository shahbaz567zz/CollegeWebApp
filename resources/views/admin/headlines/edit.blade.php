@extends('layouts.admin') 
@section('content')
<h1>Edit Headline</h1>
<div class="row">
  <div class="col-sm-9">
    {!! Form::model($headline, ['method' => 'PATCH', 'action' => ['AdminHeadlinesController@update', $headline->id], 'files' => true]) !!}
    <div class="form-group">
      {{ Form::label('category', 'Category:') }} 
      {{ Form::text('category', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('body', 'Body:') }} 
      {{ Form::text('body', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('link', 'Link:') }} 
      {{ Form::text('link', null, ['class'=>'form-control']) }}
    </div>
    
    <button type="submit" class="btn btn-primary edit-btn">Edit Headline</button> 
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminHeadlinesController@destroy', $headline->id]]) !!}
      <br><button type="submit" class="btn btn-danger delete-btn">Delete Post</button>
    {!! Form::close() !!}
  </div>
  <div class="col-sm-3"></div>
</div><hr><br><br>
  @include('includes.form_error')
@endsection