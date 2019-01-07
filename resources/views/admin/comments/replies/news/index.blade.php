@extends('layouts.admin')

@section('content')
    
    @if(count($replies)>0)
    <h1>Replies</h1>
    <div class="table-responsive comments-table">          
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Author Photo</th>
                  <th>Email</th>
                  <th>Body</th>
                  <th>News</th>
                  <th>Approve</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($replies as $reply)
                  <tr>
                  <td>{{ $reply->id }}</td>
                  <td>{{ $reply->author }}</td>
                  <td><img src="{{ $reply->user->photo?$reply->user->photo->file:"" }}" alt="No Image" height="40"></td>
                  <td>{{ $reply->email }}</td>
                  <td>{{ $reply->body }}</td>
                  <td><a href="{{ route('news.single', $reply->comment->news->id) }}">view News</a></td>
                  <td>
                    @if($reply->is_active == 1)
                    {{ Form::open(['method'=>'POST', 'route'=>['admin.news.replies.update',$reply->id]]) }}
                      <input type="hidden" value="0" name="is_active">  
                      <input type="submit" class="btn btn-info" value="Reject">
                    {{ Form::close() }}
                    @else
                    {{ Form::open(['method'=>'POST', 'route'=>['admin.news.replies.update',$reply->id]]) }}
                      <input type="hidden" value="1" name="is_active">  
                      <input type="submit" class="btn btn-success" value="Approve">
                    {{ Form::close() }}
                    @endif
                  </td>
                  <td>
                    {{ Form::open(['method'=>'DELETE', 'route'=>['admin.news.replies.delete',$reply->id]]) }}
                      <input type="submit" class="btn btn-danger" value="Delete">
                    {{ Form::close() }}
                  </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            </div>
        @else
        <h1 class="text-center">No Replies</h1>
    @endif
@stop