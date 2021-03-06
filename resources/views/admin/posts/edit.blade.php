@extends('layouts.admin') 
@section('content')
@include('includes.tinyeditor')
<h1>Edit Post</h1>
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
      {{ Form::textarea('body', null, ['class'=>'form-control', 'id'=>'postTextArea']) }}
    </div>
    <div class="form-group">
        <div id="resTableDiv"></div>
    </div>
    
    <button type="submit" class="btn btn-primary edit-btn">Edit Post</button> 
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}
      <br><button type="submit" class="btn btn-danger delete-btn">Delete Post</button>
    {!! Form::close() !!}
  </div>
  <div class="col-sm-3">
    <img src="{{ $post->photo? $post->photo->file: 'http://placehold.it/400x400' }}" alt="" class="img img-responsive img-rounded">
    <div style="margin-top:150%;">
      <button class="btn btn-info" id="tabResBtn" >Make table responsive</button>
    </div>
    <div><br>
      <button class="btn btn-info" id="fixColBtn" >Make table responsive and fix first column</button>
  </div>
  </div>
</div><hr><br><br><br><br><br><br>
  @include('includes.form_error')
@endsection
@section('script')
<script src="{{asset('js/create-post.js')}}"></script>
@endsection