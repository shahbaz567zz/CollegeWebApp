@extends('layouts.admin')

@section('content')

<h1>All Colleges</h1>
<table class="table table-bordered table-responsive">
    <thead class="table-head">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>GOVT/PRIVATE</th>
            <th>CENTRAL/STATE</th>
            <th>BODY</th>
            <th>REGION</th>
            <th>CATEGORIES</th>
            <th>EDIT</th>
            <th>VIEW</th>
            <th>COMMENTS</th>
            <th>UPDATED</th>
        </tr>
        </thead>
        <tbody>
            @if ($colleges)
                @foreach ($colleges as $college)
                <tr>
                    <td scope="row">{{$college->id}}</td>
                    <td scope="row">{{$college->name}}</td>
                    <td scope="row">{{ $college->is_govt=='1' ? 'govt' : "private" }}</td>
                    <td scope="row">{{ $college->is_central=='1' ? 'central' : "state" }}</td>
                    <td scope="row">{{ $college->body }}</td>
                    <td scope="row">{{ $college->region->name }}</td>
                    <td scope="row">
                    @foreach($college->categories as $category)
                    <li>{{ $category->name }} </li>
                    @endforeach
                    </td>
                    <td scope="row"><a href="{{ route('admin.colleges.edit', $college->id) }}">edit</a></td>
                    <td scope="row"><a href="{{ route('home.college', $college->id) }}">view</a></td>
                    <td scope="row"><a href="{{ route('admin.college.comments.show', $college->id) }}">view comments</a></td>
                    <td scope="row">{{$college->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
</table>
    
@endsection
