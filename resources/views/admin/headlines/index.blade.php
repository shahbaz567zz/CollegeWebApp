@extends('layouts.admin')

@section('content')

<h1>All Posts</h1>
<table class="table table-bordered table-responsive">
    <thead class="table-head">
        <tr>
            <th>ID</th>
            <th>CATEGORY</th>
            <th>BODY</th>
            <th>LINK</th>
            <th>EDIT</th>
            <th>UPDATED</th>
        </tr>
        </thead>
        <tbody>
            @if ($headlines)
                @foreach ($headlines as $headline)
                <tr>
                    <td scope="row">{{ $headline->id }}</td>
                    <td scope="row">{{ $headline->category }}</td>
                    <td scope="row">{{ $headline->body }}</td>
                    <td scope="row">{{ $headline->link }}</td>
                    <td scope="row"><a href="{{ route('admin.headlines.edit', $headline->id) }}">edit</a></td>
                    <td scope="row">{{ $headline->updated_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
</table>
    
@endsection
