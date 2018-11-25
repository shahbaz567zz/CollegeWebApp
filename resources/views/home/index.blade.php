@extends('layouts.main')

@section('content')

	<!-- Hero section -->
	<div class="hero-image">
        <div class="hero-text">
            <h1>Turn Dreams In To Reality</h1>
            <p>We Are Here To Help You Choose The Best College For You</p>
            <div class="widget-item">
                    <form class="search-widget">
                        <input type="text" placeholder="Search">
                        <button><i class="fa fa-search"></i></button>
                    </form>
                </div>
            <button class="btn btn-info">Take Experts Help</button>
        </div>
    </div>
	<!-- Hero section end -->


    <!-- Latest news section -->
	<div class="latest-news-section">
        <div class="ln-title">Latest News</div>
        <marquee>
		<div class="marq">
			<div class="marq-content">
                @foreach ($headlines as $headline)
				<div class="marq-item"><span class="headline_btn pink">{{ $headline->category }}</span><a href="{{ $headline->link }}">{{ $headline->body }}</a></div>
                @endforeach
			</div>
        </div>
        </marquee>
	</div>
	<!-- Latest news section end -->


	<!-- Feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="{{ asset('images/feeds.jpg') }}">
						<span class="cata feeds">FEEDS</span>
						<div class="fi-content text-white">
							<h5><a href="#">Whats Happening in the College World ?</a></h5>
							<p>You can see all the insights about exam dates, college info, college info, whats changing etc..</p>
							{{-- <a href="#" class="fi-comment">3 Comments</a> --}}
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="{{ asset('images/topcolleges.jpg') }}">
						<span class="cata tclg">TOP COLLEGES</span>
						<div class="fi-content text-white">
							<h5><a href="#">List of colleges</a></h5>
							<p>All the colleges are organised region wise and the Universities they are affiliated to.</p>
							{{-- <a href="#" class="fi-comment">3 Comments</a> --}}
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="{{ asset('images/exams.jpg') }}">
						<span class="cata texam">TOP EXAMS</span>
						<div class="fi-content text-white">
							<h5><a href="#">List of all major exams</a></h5>
							<p>Info about all the major entrance exams including application fee and eligibility criteria. </p>
							{{-- <a href="#" class="fi-comment">3 Comments</a> --}}
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="{{ asset('images/cutoffs.jpg') }}">
						<span class="cata cutoff">CUT OFFS</span>
						<div class="fi-content text-white">
							<h5><a href="#">List of college cut offs</a></h5>
							<p>Last years college cut off ranks of different categories</p>
							{{-- <a href="#" class="fi-comment">3 Comments</a> --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Feature section end -->


	<!-- Recent game section  -->
	<section class="recent-game-section spad set-bg" data-setbg="{{ asset('images/cork.jpg') }}">
		<div class="container">
			<div class="section-title">
				<div class="cata new">new</div>
				<h2>Recent Blogs</h2>
			</div>
			<div class="row">
                @foreach($recentPosts as $post)
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="{{ $post->photo->file? $post->photo->file: asset('images/noimg.jpg') }}">
							<div class="cata new">new</div>
						</div>
						<div class="rgi-content">
							<h5>{!! $post->title !!}</h5>
							<p>{!! $post->body !!}</p>
							<a href="#" class="comment">{{ count($post->comment) }} Comments</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="{{ asset('images/icons/star.png') }}" alt=""></div>
								<div class="rgi-heart"><img src="{{ asset('images/icons/heart.png') }}" alt=""></div>
							</div>
						</div>
					</div>	
                </div>
                @endforeach
				
			</div>
		</div>
	</section>
	<!-- Recent game section end -->


	<!-- Tournaments section -->
	<section class="tournaments-section spad">
		<div class="container">
			<div class="tournament-title">RECOMMENDED BLOGS</div>
			<div class="row">
				<div class="col-md-6">
					<div class="tournament-item mb-4 mb-lg-0">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="{{ asset('images/tournament/1.jpg') }}"></div>
							<div class="ti-text">
								<h4>World Of WarCraft</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="tournament-item">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="{{ asset('images/tournament/2.jpg') }}"></div>
							<div class="ti-text">
								<h4>DOOM</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Tournaments section bg -->


	<!-- Review section -->
	
	<!-- Review section end -->


	<!-- Footer top section -->
	<section class="footer-top-section">
		<div class="container">
			<div class="footer-top-bg">
				<img src="" alt="">
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="footer-logo text-white">
						
						
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="footer-widget mb-5 mb-md-0">
						<h4 class="fw-title">Latest Posts</h4>
						<div class="latest-blog">
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="{{ asset('images/latest-blog/1.jpg') }}"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="{{ asset('images/latest-blog/2.jpg') }}"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
							<div class="lb-item">
								<div class="lb-thumb set-bg" data-setbg="{{ asset('images/latest-blog/3.jpg') }}"></div>
								<div class="lb-content">
									<div class="lb-date">June 21, 2018</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisc ing ipsum </p>
									<a href="#" class="lb-author">By Admin</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="footer-widget">
						<h4 class="fw-title">Top Comments</h4>
						<div class="top-comment">
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="{{ asset('images/authors/1.jpg') }}"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="{{ asset('images/authors/2.jpg') }}"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="{{ asset('images/authors/3.jpg') }}"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
							<div class="tc-item">
								<div class="tc-thumb set-bg" data-setbg="{{ asset('images/authors/4.jpg') }}"></div>
								<div class="tc-content">
									<p><a href="#">James Smith</a> <span>on</span>  Lorem ipsum dolor sit amet, co</p>
									<div class="tc-date">June 21, 2018</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer top section end -->


@endsection
