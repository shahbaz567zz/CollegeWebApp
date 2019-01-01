@extends('layouts.admin')

@section('content')

<h1>All News</h1>
<table class="table table-bordered table-responsive">
    <thead class="table-head">
        <tr>
            <th>ID</th>
            <th>CATEGORY</th>
            <th>PHOTO</th>
            <th>TITLE</th>
            <th>BODY</th>
            <th>News</th>
            <th>COMMENTS</th>
            <th>EDIT</th>
            <th>UPDATED</th>
        </tr>
        </thead>
        <tbody>
            @if ($news)
                @foreach ($news as $headline)
                <tr>
                    <td scope="row">{{$headline->id}}</td>
                    <td scope="row">{{ $headline->category ? $headline->category->name : "Uncategorized" }}</td>
                    <td><img height="50" src="{{ $headline->photo ? $headline->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                    <td scope="row">{{ $headline->title }}</td>
                    <td scope="row">{{ strlen($headline->body)>300 ? strip_tags(substr($headline->body,0,300))."..." : strip_tags($headline->body) }}</td>
                    <td scope="row"><a href="{{ route('home.post',$headline->id) }}">view news</a></td>
                    <td scope="row"><a href="{{ route('admin.comments.show', $headline->id) }}">view comments</a></td>
                    <td scope="row"><a href="{{ route('admin.news.edit', $headline->id) }}">edit</a></td>
                    <td scope="row">{{$headline->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
</table>
    
@endsection
