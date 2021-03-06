@extends('layouts.admin')

@section('content')

<h1>All Posts</h1>
<table class="table table-bordered table-responsive">
    <thead class="table-head">
        <tr>
            <th>ID</th>
            <th>PUBLISHER</th>
            <th>CATEGORY</th>
            <th>PHOTO</th>
            <th>TITLE</th>
            <th>BODY</th>
            <th>POST</th>
            <th>COMMENTS</th>
            <th>EDIT</th>
            <th>UPDATED</th>
        </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                <tr>
                    <td scope="row">{{$post->id}}</td>
                    <td scope="row">{{$post->user->name}}</td>
                    <td scope="row">{{ $post->category ? $post->category->name : "Uncategorized" }}</td>
                    <td><img height="50" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                    <td scope="row">{{ $post->title }}</td>
                    <td scope="row">{{ strlen($post->body)>300 ? strip_tags(substr($post->body,0,300))."..." : strip_tags($post->body) }}</td>
                    <td scope="row"><a href="{{ route('home.post',$post->id) }}">view post</a></td>
                    <td scope="row"><a href="{{ route('admin.comments.show', $post->id) }}">view comments</a></td>
                    <td scope="row"><a href="{{ route('admin.posts.edit', $post->id) }}">edit</a></td>
                    <td scope="row">{{$post->updated_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
</table>
    
@endsection
