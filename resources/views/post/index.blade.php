@extends('layouts.main')

@section('content')

<!-- Page section -->
<section class="page-section recent-game-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php $color = ['new', 'adventure', 'racing']; ?>
                    @foreach($posts as $post)
                    <?php shuffle($color); ?>
                    <div class="col-md-6">
                        <a href="{{ route('home.post', $post->id) }}">
                        <div class="recent-game-item">
                            <div class="rgi-thumb set-bg" data-setbg="{{ $post->photo?$post->photo->file:'' }}">
                                <div class="cata {{ $color[1] }}">{{ $post->category->name }}</div>
                            </div>
                            <div class="rgi-content">
                                <h5>{{ $post->title }}</h5>
                                <p>{!! strlen($post->body)>300 ? (strpos(substr($post->body,0,300), '<table') ?strip_tags(substr($post->body,0,strpos(substr($post->body,0,300), '<table')))."<span class='read-more text-info'>... Read More</span>": strip_tags(substr($post->body,0,300))."<span class='read-more text-info'>... Read More</span>") : strip_tags($post->body) !!}</p>
                                <p class="comment">{{ count($post->comments) }} Comments</p>
                                <div class="rgi-extra">
                                    <div class="rgi-star"><img src="{{ asset('images/icons/star.png') }}" alt=""></div>
                                    <div class="rgi-heart"><img src="{{ asset('images/icons/heart.png') }}" alt=""></div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
                {{ $posts->render() }}
            </div>
            <!-- sidebar -->
            <div class="col-lg-4 col-md-7 sidebar pt-5 pt-lg-0">
                <!-- widget -->
                <div class="widget-item">
                    <form class="search-widget">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- widget -->
                <div class="widget-item">
                    <h4 class="widget-title">Latest Posts</h4>
                    <div class="latest-blog">
                        @foreach($recentPosts as $recentpost)
                        <div class="lb-item">
                            <div class="lb-thumb set-bg" data-setbg="{{ $recentpost->photo?$recentpost->photo->file:'' }}"></div>
                            <div class="lb-content">
                                <div class="lb-date">{{ $recentpost->updated_at->diffForHumans() }}</div>
                                <p>{!! $recentpost->title !!}</p>
                                <a href="#" class="lb-author">By {{ $recentpost->user->name }}</a>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <!-- Top Comments -->
                <div class="widget-item">
                    <h4 class="widget-title">Top Comments</h4>
                    <div class="top-comment">
                        @foreach ($topComments as $comment)
                        <div class="tc-item">
                            <div class="tc-thumb set-bg" data-setbg="{{ $comment->user->photo?$comment->user->photo->file:'' }}"></div>
                            <div class="tc-content">
                                <p><a href="#">{{ $comment->author }}</a> <span>on</span> {{ $comment->post->title }}</p>
                                <div class="tc-date">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Top Comments End -->

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
    </div>
</section>
<!-- Page section end -->

@endsection