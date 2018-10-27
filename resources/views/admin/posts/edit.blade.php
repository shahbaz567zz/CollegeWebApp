@extends('layouts.admin') 
@section('content')

<h1>Edit User</h1>
<div class="row">
  <div class="col-sm-9">
    {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true]) !!}
    <div class="form-group">
      {{ Form::label('title', 'Title:') }} 
      {{ Form::text('title', null, ['class'=>'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('category_id', 'Category:') }} 
        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
        {{ Form::label('photo_id') }} 
        {{ Form::file('photo_id', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      {{ Form::label('body', 'Description:') }} 
      {{ Form::text('body', null, ['class'=>'form-control']) }}
    </div>
    
    <button type="submit" class="btn btn-primary">Edit Post</button> 
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
      <br><button type="submit" class="btn btn-danger">Delete Post</button>
    {!! Form::close() !!}
  </div>
  <div class="col-sm-3">
    <img src="{{ $post->photo? $post->photo->file: 'http://placehold.it/400x400' }}" alt="" class="img img-responsive img-rounded">
  </div>
</div>
  @include('includes.form_error')
@endsection