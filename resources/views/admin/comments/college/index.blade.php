@extends('layouts.admin')

@section('content')
    
    @if(count($comments)>0)
    <h1>Comments</h1>
    <div class="table-responsive comments-table">          
            <table class="table">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Author</th>
                  <th>Author Photo</th>
                  <th>Email</th>
                  <th>Body</th>
                  <th>College</th>
                  <th>Replies</th>
                  <th>Approve</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($comments as $comment)
                  <tr>
                  <td>{{ $comment->id }}</td>
                  <td>{{ $comment->author }}</td>
                  <td><img src="{{ $comment->user->photo?$comment->user->photo->file:"" }}" alt="No Image" height="40"></td>
                  <td>{{ $comment->email }}</td>
                  <td>{{ $comment->body }}</td>
                  <td><a href="{{ route('home.college', $comment->college->id) }}">view college</a></td>
                  <td><a href="{{ route('admin.replies', ['type'=>'CollegeCommentReplies', 'id'=>$comment->id]) }}">view replies</a></td>
                  <td>
                    @if($comment->is_active == 1)
                    {{ Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) }}
                      <input type="hidden" value="0" name="is_active">  
                      <input type="submit" class="btn btn-info" value="Reject">
                    {{ Form::close() }}
                    @else
                    {{ Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) }}
                      <input type="hidden" value="1" name="is_active">  
                      <input type="submit" class="btn btn-success" value="Approve">
                    {{ Form::close() }}
                    @endif
                  </td>
                  <td>
                    {{ Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id]]) }}
                      <input type="submit" class="btn btn-danger" value="Delete">
                    {{ Form::close() }}
                  </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            </div>
            <div class="row">
              <div class="col-sm-6 col-sm-offset-5">
                {{ $comments->render() }}
              </div>
            </div>
        @else
        <h1 class="text-center">No Comments</h1>
    @endif
@stop