@extends('attachment/layouts/main')
    @section('content')
        <!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
        <div id="headerwrap">
            <div class="container">
                <div class="row">
                        @foreach($head->posts as $post)
                            <div class="col-lg-8 col-lg-offset-2">
                                <h1>{{ $post->title }}</h1>
                                <h5>{{ $post->desc }}</h5>
                            </div>
                            <div class="col-lg-8 col-lg-offset-2 himg">
                                @foreach(explode(' ', $post->img) as $image)
                                    <img src='{{ asset("images/$image") }}' class="img-responsive">
                                @endforeach
                            </div>
                        @endforeach
                </div><!-- /row -->
            </div> <!-- /container -->
        </div><!-- /headerwrap -->

        <!-- *****************************************************************************************************************
         SERVICE LOGOS
         ***************************************************************************************************************** -->
        <div id="service">
            <div class="container">
                <div class="row centered">
                    @foreach($block->posts as $post)
                        <div class="col-md-4">
                            <i class="fa fa-heart-o"></i>
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->desc }}</p>
                            <p><br/><a href="{{ route('post.single',$post->id) }}" class="btn btn-theme">More Info</a></p>
                        </div>
                    @endforeach
                </div>
            </div><! --/container -->
        </div><! --/service -->

        <!-- *****************************************************************************************************************
         PORTFOLIO SECTION
         ***************************************************************************************************************** -->
        <div id="portfoliowrap">
            <h3>LATEST WORKS</h3>
                    <div class="portfolio-centered">
                        <div class="recentitems portfolio">
                            @foreach($portfolio->posts as $post)
                            <div class="portfolio-item graphic-design">
                                <div class="he-wrap tpl6">
                                    {{-- выводим первое изображение из серии так как в блейд нельзя
                                    определять переменные то воспользуемся нативным php--}}
                                    <?php $images = explode(' ',$post->img) ?>
                                    <img src="{{ asset("images/$images[0]") }}" alt="no image">
                                    <div class="he-view">
                                        <div class="bg a0" data-animate="fadeIn">
                                            <h3 class="a1" data-animate="fadeInDown">A Graphic Design Item</h3>
                                            <a data-rel="prettyPhoto" href="{{ asset("images/$images[0]") }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                            <a href="{{ route('single.project',$post->id) }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                                        </div><!-- he bg -->
                                    </div><!-- he view -->
                                </div><!-- he wrap -->
                            </div><!-- end col-12 -->
                            @endforeach

                </div><!-- portfolio -->
            </div><!-- portfolio container -->
        </div><!--/Portfoliowrap -->


        <!-- *****************************************************************************************************************
         MIDDLE CONTENT
         ***************************************************************************************************************** -->

        <div class="container mtb">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-1">
                    <h4>More About Our Agency.</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
                    <p><br/><a href="about.html" class="btn btn-theme">More Info</a></p>
                </div>

                <div class="col-lg-3">
                    <h4>Frequently Asked</h4>
                    <div class="hline"></div>
                    <p><a href="#">How cool is this theme?</a></p>
                    <p><a href="#">Need a nice good-looking site?</a></p>
                    <p><a href="#">Is this theme retina ready?</a></p>
                    <p><a href="#">Which version of Font Awesome uses?</a></p>
                    <p><a href="#">Free support is integrated?</a></p>
                </div>

                <div class="col-lg-3">
                    <h4>Latest Posts</h4>
                    <div class="hline"></div>
                    @foreach($posts as $post)
                        <p><a href="{{ action('Attachment\SiteController@PostShow', $post->id) }}">{{ $post->title }}</a></p>
                    @endforeach
                </div>

            </div><! --/row -->
        </div><! --/container -->

        <!-- *****************************************************************************************************************
         TESTIMONIALS
         ***************************************************************************************************************** -->
        <div id="twrap">
            <div class="container centered">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <i class="fa fa-comment-o"></i>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        <h4><br/>Marcel Newman</h4>
                        <p>WEB DESIGNER - BLACKTIE.CO</p>
                    </div>
                </div><! --/row -->
            </div><! --/container -->
        </div><! --/twrap -->

        <!-- *****************************************************************************************************************
         OUR CLIENTS
         ***************************************************************************************************************** -->
        <div id="cwrap">
            <div class="container">
                <div class="row centered">
                    <h3>OUR CLIENTS</h3>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="assets/img/clients/client01.png" class="img-responsive">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="assets/img/clients/client02.png" class="img-responsive">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="assets/img/clients/client03.png" class="img-responsive">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img src="assets/img/clients/client04.png" class="img-responsive">
                    </div>
                </div><! --/row -->
            </div><! --/container -->
        </div><! --/cwrap -->
    @endsection