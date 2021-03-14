	<!-- HEADER -->
    @include('site.includes.header')
	<!-- HEADER -->
  <body>

<!-- PAGE HEADER -->
<div id="post-header" class="page-header">
    <div class="page-header-bg" style="background-image: url('{{asset('./img/header-1.jpg')}}');" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-category">
                    <a href="#">Category: {{$category->name}}</a>
                </div>
                <h1>{{$category->name}}</h1>
                <ul class="post-meta">
                    <li>{{ $category->created_at->toFormattedDateString() }}</li>
                    <li><i class="fa fa-comments"></i> 3</li>
                    <li><i class="fa fa-eye"></i> 807</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /PAGE HEADER -->



	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">

                    <!-- SECTION -->
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-8">
                                    @foreach ( $category->posts as $post )
                                    <!-- post -->
                                    <div class="post post-row">
                                        <a class="post-img" href="{{ route('post.show' , ['slug' => $post->slug]) }}"><img src="{{asset($post->featured)}}" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-category">
                                                <a href="#">{{$category->name}}</a>
                                            </div>
                                            <h3 class="post-title"><a href="{{ route('post.show' , ['slug' => $post->slug]) }}"> {{ $post->title }} </a></h3>
                                            <ul class="post-meta">
                                                <li><a href="author.html">John Doe</a></li>
                                                <li>{{ $post->created_at->toFormattedDateString() }}</li>
                                            </ul>
                                            <p>{{ $post->content }}</p>
                                        </div>
                                    </div>
                                    <!-- /post --> 

                                    @endforeach

                                    <br>
                                    <div class="section-row loadmore text-center">
                                        <a href="#" class="primary-button">Load More</a>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /SECTION -->	
                </div>
                                <div class="col-md-4">
                                    <!-- social widget -->
                                    <div class="aside-widget">
                                        <div class="section-title">
                                            <h2 class="title">Social Media</h2>
                                        </div>
                                        <div class="social-widget">
                                            <ul>
                                                <li>
                                                    <a href="#" class="social-facebook">
                                                        <i class="fa fa-facebook"></i>
                                                        <span>21.2K<br>Followers</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="social-twitter">
                                                        <i class="fa fa-twitter"></i>
                                                        <span>10.2K<br>Followers</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="social-google-plus">
                                                        <i class="fa fa-google-plus"></i>
                                                        <span>5K<br>Followers</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /social widget -->

                                    <!-- category widget -->
                                    <div class="aside-widget">
                                        <div class="section-title">
                                            <h2 class="title">Categories</h2>
                                        </div>
                                        <div class="category-widget">
                                            <ul>
                                                @foreach ($categories as $category )
                                                    <li>
                                                        <a href="{{ route('category.show' , ['id' => $category->id]) }}">
                                                            {{ $category->name }} 
                                                            <span>{{$category->posts->count()}}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /category widget -->

                                    <!-- newsletter widget -->
                                    <div class="aside-widget">
                                        <div class="section-title">
                                            <h2 class="title">Newsletter</h2>
                                        </div>
                                        <div class="newsletter-widget">
                                            <form>
                                                <p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
                                                <input class="input" name="newsletter" placeholder="Enter Your Email">
                                                <button class="primary-button">Subscribe</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /newsletter widget -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /SECTION -->

                    <!-- SECTION -->
                    <div class="section">
                        <!-- container -->
                        <div class="container">
                            <!-- row -->
                            <div class="row">
                                <!-- ad -->
                                <div class="col-md-12 section-row text-center">
                                    <a href="#" style="display: inline-block;margin: auto;">
                                        <img class="img-responsive" src="{{asset('./img/ad-2.jpg')}}" alt="">
                                    </a>
                                </div>
                                <!-- /ad -->
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                    </div>
                    <!-- /SECTION -->

	

	<!-- FOOTER -->
	   @include('site.includes.footer')
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>

</body>

</html>