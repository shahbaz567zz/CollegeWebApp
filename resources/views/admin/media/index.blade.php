@extends('layouts.admin')

@section('content')
    <h1>All Media</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>CREATED AT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo)
                <tr>
                    <td scope="row">{{ $photo->id }}</td>
                    <td><img src="{{ $photo->file }}" alt="no Image" height="50"></td>
                    <td>{{ $photo->created_at?$photo->created_at:'unknown' }}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
                            <div class="form-group">
                                <input type='submit' value="Delete" class="btn btn-danger">
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop