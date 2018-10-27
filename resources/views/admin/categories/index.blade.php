@extends('layouts.admin')

@section('content')

<h1>Categories</h1>

<div class="col-sm-6">
    {!! Form::open(['method' => 'post', 'action' => 'AdminCategoriesController@store']) !!}
        <div class="form-group">
            {{ Form::label('name','Name:') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Create New Category', ['class'=>'btn btn-primary']) }}
        </div>
    {!! Form::close() !!}

</div>

<div class="col-sm-6">
    @if($categories)
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
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>                
                    <td>{{ $category->name }}</td>                
                    <td>{{ $category->created_at?$category->created_at->diffForHumans():'unknown' }}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
                            <br><button type="submit" class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                </tr>              
                @endforeach
            </tbody>
        </table>
    @endif
</div>

    
@stop