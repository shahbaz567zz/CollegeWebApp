@extends('layouts.admin')

@section('content')

<h1>All Tables</h1>
<table class="table table-bordered table-responsive">
    <thead class="table-head">
        <tr>
            <th>ID</th>
            <th>TABLE NAME</th>
            <th>BODY</th>
            <th>VIEW TABLE</th>
            <th>Delete TABLE</th>
            <th>UPDATED</th>
        </tr>
        </thead>
        <tbody>
            @if ($tables)
                @foreach ($tables as $table)
                <tr>
                    <td scope="row">{{$table->id}}</td>
                    <td scope="row">[[{{ $table->title }}]]</td>
                    <td scope="row">{{ $table->body }}</td>
                    <td scope="row"><a href="{{ route('admin.table.show',$table->id) }}">view table</a></td>
                    <td scope="row">
                        {!! Form::open(['method' => 'DELETE','onsubmit'=>'return confirm("Do you really want to delete the table?")', 'action' => ['TableController@destroy', $table->id]]) !!}
                            <br><button type="submit" class="btn btn-danger delete-btn">Delete</button>
                        {!! Form::close() !!}
                    </td>
                    <td scope="row">{{$table->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
</table>
    
@endsection
