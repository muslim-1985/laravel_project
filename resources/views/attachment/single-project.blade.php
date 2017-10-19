@extends('attachment/layouts/main')
@section('content')
<div class="container mt">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 centered">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    {{-- выводим первое  активное (с классом active) изображение из серии так как в блейд нельзя
                                    определять переменные то воспользуемся нативным php--}}
                    <?php $images = explode(' ',$project->img) ?>
                    <div class= "item active">
                        <img src="{{ asset("images/$images[0]") }}" alt="no image">
                    </div>
                    @foreach(explode(' ',$project->img) as $image)
                        <div class= "item">
                            <img src="{{ asset("images/$image") }}" alt="no image">
                        </div>
                    @endforeach
                </div>
            </div><! --/Carousel -->
        </div>

        <div class="col-lg-5 col-lg-offset-1">
            <div class="spacing"></div>
            <h4>{{ $project->title }}</h4>
            <p>{{ $project->content }}</p>
        </div>

        <div class="col-lg-4 col-lg-offset-1">
            <div class="spacing"></div>
            <h4>Project Details</h4>
            <div class="hline"></div>
            <p><b>Date:</b>{{ date('M j,Y', strtotime($project->created_at ))}}</p>
            <p><b>Author:</b> Marcel Newman</p>
            <p><b>Categories:</b>{{ $project->category->title }}</p>
            <p><b>Tagged:</b> @foreach($project->tags as $tag)
                                    {{ $tag->title }}</p>
                                @endforeach
            <p><b>Client:</b> Wonder Corp.</p>
            <p><b>Website:</b> <a href="http://blacktie.co">http://blacktie.co</a></p>
        </div>

    </div><! --/row -->
</div><! --/container -->

<!-- *****************************************************************************************************************
 PORTFOLIO SECTION
 ***************************************************************************************************************** -->
<div id="portfoliowrap">
    <div class="portfolio-centered">
        <h3>Related Works.</h3>
        <div class="recentitems portfolio">
            @foreach($project->tags as $tag)
                @foreach($tag->posts as $post)
                    <div class="portfolio-item web-design">
                        <div class="he-wrap tpl6">
                            {{-- выводим первое изображение из серии так как в блейд нельзя
                                    определять переменные то воспользуемся нативным php--}}
                            <?php $images = explode(' ',$post->img) ?>
                            <img src="{{ asset("images/$images[0]") }}" alt="no image">
                            <div class="he-view">
                                <div class="bg a0" data-animate="fadeIn">
                                    <h3 class="a1" data-animate="fadeInDown">A Web Design Item</h3>
                                    <a data-rel="prettyPhoto" href="{{ asset("images/$images[0]") }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
                                    <a href="{{ route('single.project',$post->id) }}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
                                </div><!-- he bg -->
                            </div><!-- he view -->
                        </div><!-- he wrap -->
                    </div><!-- end col-12 -->
                @endforeach
            @endforeach
        </div><!-- portfolio -->
    </div><!-- portfolio container -->
</div><!--/Portfoliowrap -->
@endsection

