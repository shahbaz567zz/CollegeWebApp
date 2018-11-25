@extends('layouts.admin') 
@section('content')
@include('includes.tinyeditor')
<h1>Edit College</h1>
<div class="row">
  <div class="col-sm-9">
    {!! Form::model($college, ['method' => 'PATCH', 'action' => ['AdminCollegesController@update', $college->id], 'files' => true]) !!}
    <div class="form-group">
        <label for="">Name of the College:</label>
        <input type="text" value="{{ $college->name }}" class="form-control" name="name" id="clgName" placeholder="">
    </div>
    <div class="form-group">
        <label for="clgCategoryId">College Category:</label>
        <select class="form-control" name="category_id[]" id="clgCategoryId" multiple>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
            <label for="clgRegionId">College Region:</label>
            <select class="form-control" name="region_id" id="clgRegionId">
                @foreach ($regions as $region)
                <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
    <div class="form-group">
        <label for="clgPhoto">College Photo:</label>
        <input type="file" class="form-control" name="photo_id" id="clgPhoto">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name='is_govt' value="yes">Is Govt</label>
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name='is_central' value="yes">Is Central</label>
    </div>
    <div class="form-group">
        <label for="clgBody">Description:</label>
        <textarea class="form-control" name="body" rows="5" id="clgBody">{{ $college->body }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary edit-btn">Submit</button> 
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCollegesController@destroy', $college->id]]) !!}
      <br><button type="submit" class="btn btn-danger delete-btn">Delete Post</button>
    {!! Form::close() !!}
  </div>
  <div class="col-sm-3">
    <img src="{{ $college->photo? $college->photo->file: 'http://placehold.it/400x400' }}" alt="" class="img img-responsive img-rounded">
  </div>
</div><hr><br><br>
  @include('includes.form_error')
@endsection