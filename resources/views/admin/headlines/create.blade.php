@extends('layouts.admin')

@section('content')
<h1>Create Headline</h1>
{!! Form::open(['method' => 'POST', 'action' => 'AdminHeadlinesController@store', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    <label for="category">Category:</label>
    <input type="text" class="form-control" name="category" id="category" placeholder="">
</div>
<div class="form-group">
    <label for="body">Body:</label>
    <input type="text" class="form-control" name="body" id="body" placeholder="">
</div>
<div class="form-group">
    <label for="link">Link:</label>
    <input type="text" class="form-control" name="link" id="link" placeholder="">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
{!! Form::close() !!}

@include('includes.form_error')
@endsection