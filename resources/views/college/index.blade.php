@extends('layouts.main')

@section('content')

<!-- Page section -->
<?php  
echo "<pre>";
foreach($colleges as $college){
    foreach($college->categories as $cat){
        print_r($cat->name);
    }
   
}
echo "</pre>";
?>
<section class="page-section recent-game-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php $color = ['new', 'adventure', 'racing']; ?>
                    @foreach($colleges as $college)
                    <?php shuffle($color); ?>
                    <div class="col-md-4">
                        <a href="{{ route('home.college', $college->id) }}">
                        <div class="recent-game-item">
                            <div class="rgi-thumb set-bg" data-setbg="{{ $college->photo?$college->photo->file:'' }}">
                                @foreach ($college->categories as $category)
                                <div class="cata {{ $color[1] }}">{{ $category->name }}</div>
                                @endforeach
                            </div>
                            <div class="rgi-content">
                                <h5>{{ $college->name }}</h5>
                                <p>{!! $college->body !!}</p>
                                <p class="comment">{{ count($college->comments) }} Comments</p>
                            </div>
                        </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
                {{ $colleges->render() }}
            </div>
            <!-- sidebar -->
            <div class="col-lg-4 col-md-7 sidebar pt-5 pt-lg-0">
                <!-- widget -->
                <div class="widget-item">
                    <form class="search-widget">
                        <input type="text" placeholder="Search College..">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <!-- widget -->
                <div class="widget-item"><br /><br />
                    <h4 class="widget-title">Recently Added Colleges</h4>
                    <div class="latest-blog">
                        @foreach($recentColleges as $recentcollege)
                        <div class="lb-item">
                            <div class="lb-thumb set-bg" data-setbg="{{ $recentcollege->photo->file }}"></div>
                            <div class="lb-content">
                                <div class="lb-date">{{ $recentcollege->updated_at->diffForHumans() }}</div>
                                <p>{!! $recentcollege->name !!}</p>
                                <a href="#" class="lb-author">By {{ $recentcollege->name }}</a>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <!-- widget -->
                <div class="widget-item">
                    <h4 class="widget-title">Top Comments</h4>
                    <div class="top-comment">
                        <div class="tc-item">
                            <div class="tc-thumb set-bg" data-setbg="img/authors/1.jpg"></div>
                            <div class="tc-content">
                                <p><a href="#">James Smith</a> <span>on</span> Lorem consec ipsum dolor sit amet, co</p>
                                <div class="tc-date">June 21, 2018</div>
                            </div>
                        </div>
                        <div class="tc-item">
                            <div class="tc-thumb set-bg" data-setbg="img/authors/2.jpg"></div>
                            <div class="tc-content">
                                <p><a href="#">Michael James</a> <span>on</span>Cras sit amet sapien aliquam</p>
                                <div class="tc-date">June 21, 2018</div>
                            </div>
                        </div>
                        <div class="tc-item">
                            <div class="tc-thumb set-bg" data-setbg="img/authors/3.jpg"></div>
                            <div class="tc-content">
                                <p><a href="#">Justin More</a> <span>on</span> Lorem ipsum dolor consecsit amet, co</p>
                                <div class="tc-date">June 21, 2018</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- widget -->
                <div class="widget-item">
                    <div class="feature-item set-bg" data-setbg="img/features/1.jpg">
                        <span class="cata new">new</span>
                        <div class="fi-content text-white">
                            <h5><a href="#">Suspendisse ut justo tem por, rutrum</a></h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <a href="#" class="fi-comment">3 Comments</a>
                        </div>
                    </div>
                </div>
                <!-- widget -->
                <div class="widget-item">
                    <div class="review-item">
                        <div class="review-cover set-bg" data-setbg="img/review/1.jpg">
                            <div class="score yellow">9.3</div>
                        </div>
                        <div class="review-text">
                            <h5>Assasin’’s Creed</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum dolor sit ame.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page section end -->

@endsection