@extends('layouts.admin')

@section('content')

<h1>Create Post</h1>
{!! Form::open(['method' => 'POST', 'action' => 'AdminPostsController@store', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    <label for="">Title:</label>
    <input type="text" class="form-control" name="title" id="postTitle" placeholder="">
</div>
<div class="form-group">
    <label for="postCategoryId">Category:</label>
    <select class="form-control" name="category_id" id="postCategoryId">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="postPhoto">Photo:</label>
    <input type="file" class="form-control" name="photo_id" id="postPhoto">
</div>
<div class="form-group">
    <label for="postBody">Description:</label>
    <textarea class="form-control" rows="5" id="postBody"></textarea>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}

@include('includes.form_error')
@endsection