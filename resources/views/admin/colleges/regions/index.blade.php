@extends('layouts.admin')

@section('content')

<h1>College Regions</h1>

<div class="col-sm-6">
    {!! Form::open(['method' => 'post', 'action' => 'AdminCollegeRegionsController@store']) !!}
        <div class="form-group">
            {{ Form::label('name','Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Create New College Category', ['class'=>'btn btn-primary']) }}
        </div>
    {!! Form::close() !!}

</div>

<div class="col-sm-6">
    @if($regions)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>CREATED AT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regions as $region)
                <tr>
                    <td>{{ $region->id }}</td>                
                    <td>{{ $region->name }}</td>                
                    <td>{{ $region->created_at?$region->created_at->diffForHumans():'unknown' }}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCollegeRegionsController@destroy', $region->id]]) !!}
                            <br><button type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                </tr>              
                @endforeach
            </tbody>
        </table>
    @endif
</div>

    
@stop