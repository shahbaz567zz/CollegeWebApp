@extends('layouts.admin')

@section('content')
@include('includes.tinyeditor')
<h1>Create College</h1>
<div class="row">
    <div class="col-sm-9">
        {!! Form::open(['method' => 'POST', 'action' => 'AdminCollegesController@store', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Name of the College:</label>
            <input type="text" class="form-control" name="name" id="clgName" placeholder="">
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
            <label><input type="checkbox" name='is_govt' value="yes" checked>Is Govt</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name='is_central' value="yes" checked>Is Central</label>
        </div>
        <div class="form-group">
            <label for="clgBody">Description:</label>
            <textarea class="form-control" name="body" rows="20" id="clgBody"></textarea>
        </div>
        <div class="form-group">
            <div id="resTableDiv"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-3">
        <div style="margin-top:250%;">
            <button class="btn btn-info" id="tabResBtn" >Make table responsive</button>
        </div>
        <div><br>
            <button class="btn btn-info" id="fixColBtn" >Make table responsive and fix first column</button>
        </div>
    </div>
</div>
<br /><br />

@include('includes.form_error')
@endsection
@section('script')
<script src="{{asset('js/create-post.js')}}"></script>
@endsection