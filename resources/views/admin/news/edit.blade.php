@extends('layouts.admin') 
@section('content')
@include('includes.tinyeditor')
<h1>Edit News</h1>
<div class="row">
  <div class="col-sm-9">
    {!! Form::model($news, ['method' => 'PATCH', 'action' => ['NewsController@update', $news->id], 'files' => true]) !!}
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
    
    <button type="submit" class="btn btn-primary edit-btn">Edit News</button> 
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['NewsController@destroy', $news->id]]) !!}
      <br><button type="submit" class="btn btn-danger delete-btn">Delete News</button>
    {!! Form::close() !!}
  </div>
  <div class="col-sm-3">
    <img src="{{ $news->photo? $news->photo->file: 'http://placehold.it/400x400' }}" alt="" class="img img-responsive img-rounded">
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