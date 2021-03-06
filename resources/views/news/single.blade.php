@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row">

        <!-- News Content Column -->
        <div class="col-lg-8"><br>

            <!-- Title -->
            <h1>{{ $news->title }}</h1>
            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted {{ $news->created_at->diffForHumans() }}</p>

            <hr>

            <!-- Preview Image -->
            
            
            @if($news->photo)
            <img class="img-responsive" src="{{ $news->photo->file }}" alt="">
            @endif
            <hr>

            <!-- Post Content -->
            {!! $news->body !!}

            <hr>

            @if(Session::has('comment_message'))
            {{ session('comment_message') }}
            @endif
            <!-- News Comments -->
            {{-- @if(Auth::check()) --}}
            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                {!! Form::open(['method'=>'post', 'route'=>'news.comment.post']) !!}
                <input type="hidden" value="{{ $news->id }}" name="news_id">
                <div class="form-group">
                    <label for="comment-body">Message:</label>
                    <textarea name="body" class="form-control" rows="5" id="comment-body"></textarea>
                </div>
                <input type="submit" value="Submit Comment" class="btn btn-primary">

                {!! Form::close() !!}
            </div>
            {{-- @endif --}}
            <hr>

            <!-- Posted Comments -->
            <div class="posted-comments">
                @if(count($comments)>0)
                <!-- Comment -->
                @foreach($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object comment-profile-pic" height="50" src="{{ $comment->user->photo?$comment->user->photo->file:'' }}" alt="No Image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment->author }}
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                        </h4>
                        {{ $comment->body }}
                        <div class="form-group show-reply">
                            <span><small>{{ count($comment->replies) }} comments </small></span>
                            <span class="fa fa-reply"> <a href="javascript:void(0)" data-comment-id="{{ $comment->id }}" class="reply-toggle" > Reply</a></span>
                        </div>

                        <!-- Nested Comment -->
                        <div class="comment-reply" id="comment-reply-{{ $comment->id }}">
                        @if(count($comment->replies)>0)
                        @foreach($comment->replies as $reply)
                        @if($reply->is_active == 1)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" height="50" src="{{ $reply->user->photo->file }}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $reply->author }}
                                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                                </h4>
                                {{ $reply->body }}
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                        {!! Form::open(['method'=>'post', 'route'=>'news.comment.reply.post']) !!}
                        <input type="hidden" value="{{ $comment->id }}" name="news_comment_id">
                        <div class="form-group">
                            <label for="reply-body">Reply:</label>
                            <textarea name="body" class="form-control" rows="3" id="reply-body"></textarea>
                        </div>
                        <input type="submit" value="Submit Reply" class="btn btn-primary">
                        {!! Form::close() !!}
                        </div>
                        <!-- End Nested Comment -->

                    </div>
                </div>
                @endforeach
                @endif
                <!-- Comment -->
            </div>
        </div>

        <!-- News Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- News Search Well -->
            <br>
            <div class="well">
                <h4>News Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- News Categories Well -->
            <div class="well">
                <h4>News Categories</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">
                            <li><a href="#">To be added soon.</a>
                            </li>
                            {{-- <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li>
                            <li><a href="#">Category Name</a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- Advertisement widget -->
            <div class="widget-item">
                <div class="feature-item set-bg" data-setbg="img/features/1.jpg">
                    <span class="cata new">Ad Space</span>
                    <div class="fi-content text-white">
                        <h5><a href="#">This Space is Reserved for Advertisement.</a></h5>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p> --}}
                        {{-- <a href="#" class="fi-comment">3 Comments</a> --}}
                    </div>
                </div>
            </div>
            
            <div class="widget-item">
                <div class="review-item">
                    {{-- <div class="review-cover set-bg" data-setbg="img/review/1.jpg">
                        <div class="score yellow">9.3</div>
                    </div> --}}
                    <div class="review-text">
                        <h5>Contact Admin</h5>
                        <p>If you want to use this space to advertise with us. Please mail us @ <a href="mailto:{{ config('app.site_email') }}?subject=Advertisement%20Request">{{ config('app.site_email') }}</a></p>
                    </div>
                </div>
            </div>
            <!-- Advertisement widget -->

        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>

@stop

@section('script')
<script>

</script>    
@stop