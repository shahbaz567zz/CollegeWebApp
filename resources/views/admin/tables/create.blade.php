@extends('layouts.admin')
@section('content')

@include('includes.tinyeditor')
<h1>Create New Table</h1>
<div class="row">
    <div class="col-sm-9">
        {!! Form::open(['method' => 'POST', 'action' => 'TableController@store', 'onsubmit'=>'return makeTableResponsive()', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <label for="">Title:</label>
            <input type="text" class="form-control" name="title" id="newsTitle" placeholder="">
        </div>
        <div class="form-group">
            <label for="newsBody">Table Body:</label>
            <textarea class="form-control" name="body" rows="20" id="newsBody"></textarea>
        </div>
        <div class="form-group">
            <div id="resTableDiv"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>
    <div class="col-sm-3">
        <div style="margin-top:150%;">
            <button class="btn btn-info" id="tabResBtn" >Make table responsive</button>
        </div>
        <div><br>
            <button class="btn btn-info" id="fixColBtn" >Make table responsive and fix first column</button>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>
@include('includes.form_error')
@endsection
@section('script')
<script src="{{asset('js/table-responsive.js')}}"></script>
@endsection