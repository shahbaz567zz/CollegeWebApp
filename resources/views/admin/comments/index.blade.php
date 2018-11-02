@extends('layouts.admin')

@section('content')
    
    @if(count($comments)>0)
    <h1>Comments</h1>
    <div class="table-responsive">          
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Author Photo</th>
                  <th>Email</th>
                  <th>Body</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($comments as $comment)
                  <tr>
                  <td>{{ $comment->id }}</td>
                  <td>{{ $comment->author }}</td>
                  <td><img src="{{ $comment->user->photo->file }}" alt="No Image" height="40"></td>
                  <td>{{ $comment->email }}</td>
                  <td>{{ $comment->body }}</td>
                  <td><a href="{{ route('home.post', $comment->post->id) }}">view post</a></td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            </div>
        @else
        <h1 class="text-center">No Comments</h1>
    @endif
@stop