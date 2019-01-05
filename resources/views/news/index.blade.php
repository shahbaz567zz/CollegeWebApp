@extends('layouts.main')

@section('content')

<!-- Page section -->

<section class="page-section recent-game-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php $color = ['new', 'adventure', 'racing']; ?>
                    @foreach($news as $headline)
                    <?php shuffle($color);?>
                    <div class="col-md-12">
                        <a href="{{ route('news.single', $headline->id) }}">
                        <div class="recent-game-item">
                            <div class="cata {{ $color[1] }}">{{ $headline->category?$headline->category->name:'' }}</div>
                            <div class="news-content">
                                <h5>{{ $headline->title }}</h5>
                                <p>{!! strlen($headline->body)>300 ? (strpos(substr($headline->body,0,300), '<table') ?strip_tags(substr($headline->body,0,strpos(substr($headline->body,0,300), '<table')))."<span class='read-more text-info'>... Read More</span>": strip_tags(substr($headline->body,0,300))."<span class='read-more text-info'>... Read More</span>") : strip_tags($headline->body) !!}</p>
                                
                                {{-- <p class="comment">{{ count($headline->comments) }} Comments</p> --}}
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
                {{ $news->render() }}
            </div>
            <!-- sidebar -->
            <div class="col-lg-4 col-md-7 sidebar pt-5 pt-lg-0">
                <!-- widget -->
                <div class="widget-item">
                    <form class="search-widget">
                        <input type="text" placeholder="Search News..">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
                {{-- <!-- Top Comments -->
                <div class="widget-item">
                    <h4 class="widget-title">Top Comments</h4>
                    <div class="top-comment">
                        @foreach ($topComments as $comment)
                        <div class="tc-item">
                            <div class="tc-thumb set-bg" data-setbg="{{ $comment->user->photo?$comment->user->photo->file:'' }}"></div>
                            <div class="tc-content">
                                <p><a href="#">{{ $comment->author }}</a> <span>on</span> {{ $comment->college->name }}</p>
                                <div class="tc-date">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> --}}
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