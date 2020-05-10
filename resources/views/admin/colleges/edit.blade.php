@extends('layouts.admin') 
@section('content')
@include('includes.tinyeditor')
<h1>Edit College</h1>
<div class="row">
  <div class="col-sm-9">
    {!! Form::model($college, ['method' => 'PATCH', 'action' => ['AdminCollegesController@update', $college->id], 'files' => true]) !!}
    <div class="form-group">
        <input type="text" value="{{ $college->college_code }}" class="form-control" name="college_code" placeholder="College Unique Code">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->name }}" class="form-control" name="name" placeholder="College Name">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->eligibility_10_perc }}" class="form-control" name="eligibility_10_perc" placeholder="Minimum Percentage required in 10th">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->eligibility_12_perc }}" class="form-control" name="eligibility_12_perc" placeholder="Minimum Percentage required in 12th">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->eligibility_age }}" class="form-control" name="eligibility_age" placeholder="Maximum age limit">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->admission_mode }}" class="form-control" name="admission_mode" placeholder="Admission mode">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->college_rank }}" class="form-control" name="college_rank" placeholder="College rank">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->address }}" class="form-control" name="address" placeholder="College address">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->seats }}" class="form-control" name="seats" placeholder="Total number of seats">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->fee_first_year }}" class="form-control" name="fee_first_year" placeholder="First year Fees">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->fee_four_years }}" class="form-control" name="fee_four_years" placeholder="Total fees for 4 years">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->hostel_fees }}" class="form-control" name="hostel_fees" placeholder="Hostel fees (for 1 year)">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->govt_private }}" class="form-control" name="govt_private" placeholder="Govt / Private (Write only G or P)">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->pic_url }}" class="form-control" name="pic_url" placeholder="College Picture url with good resolution">
    </div>
    <div class="form-group">
        <input type="text" value="{{ $college->placement }}" class="form-control" name="placement" placeholder="Placement in percentage (if placement in 70%, write only '70')">
    </div>
    {{-- <div class="form-group">
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
    </div> --}}
    <div class="form-group">
        <label for="clgBody">Description:</label>
        <textarea class="form-control" name="college_description" rows="20">{{ $college->college_description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary edit-btn">Submit</button> 
    {!! Form::close() !!}
    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCollegesController@destroy', $college->id]]) !!}
      <br><button type="submit" class="btn btn-danger delete-btn">Delete College Details</button>
    {!! Form::close() !!}
  </div>
  {{-- <div class="col-sm-3">
    <img src="{{ $college->photo? $college->photo->file: 'http://placehold.it/400x400' }}" alt="" class="img img-responsive img-rounded">
    <div class="col-sm-3">
        <div style="margin-top:250%;">
            <button class="btn btn-info" id="tabResBtn" >Make table responsive</button>
        </div>
        <div><br>
            <button class="btn btn-info" id="fixColBtn" >Make table responsive and fix first column</button>
        </div>
    </div>
  </div> --}}
</div><hr><br><br>
  @include('includes.form_error')
@endsection