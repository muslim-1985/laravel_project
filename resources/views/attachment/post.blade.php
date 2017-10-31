@extends('attachment/layouts/main')
@section('content')

<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

<div class="container mtb">
    <div class="row">

        <! -- SINGLE POST -->
        <div class="col-lg-8">
            @if($post->img)
                @foreach(explode(' ', $post->img) as $image)
                    <p><img src="{{asset("images/$image" )}}" class="img-responsive" alt="No image" style="width: 50px; height: 50px;"></p>
                @endforeach
            @endif
            <a href="single-post.html"><h3 class="ctitle">{{ $post->title }}</h3></a>
            <p><csmall>Posted: {{ date('M j,Y', strtotime($post->created_at ))}}</csmall> | <csmall2>By: Admin - 3 Comments</csmall2></p>
            <p>{{ $post->content }}</p>
            <div class="spacing"></div>
            <h6>SHARE:</h6>
            <p class="share">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-tumblr"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
            </p>

        </div><! --/col-lg-8 -->


        <! -- SIDEBAR -->
        <div class="col-lg-4">
            <h4>Search</h4>
            <div class="hline"></div>
            <p>
                <br/>
                <input type="text" class="form-control" placeholder="Search something">
            </p>

            <div class="spacing"></div>

            <h4>Categories</h4>
            <div class="hline"></div>
            <p><a href="#"><i class="fa fa-angle-right"></i> Wordpress</a> <span class="badge badge-theme pull-right">9</span></p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Photoshop</a> <span class="badge badge-theme pull-right">3</span></p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Web Design</a> <span class="badge badge-theme pull-right">11</span></p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Development</a> <span class="badge badge-theme pull-right">5</span></p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Tips & Tricks</a> <span class="badge badge-theme pull-right">7</span></p>
            <p><a href="#"><i class="fa fa-angle-right"></i> Code Snippets</a> <span class="badge badge-theme pull-right">12</span></p>

            <div class="spacing"></div>

            <h4>Recent Posts</h4>
            <div class="hline"></div>
            <ul class="popular-posts">
                <li>
                    <a href="#"><img src="assets/img/thumb01.jpg" alt="Popular Post"></a>
                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
                    <em>Posted on 02/21/14</em>
                </li>
                <li>
                    <a href="#"><img src="assets/img/thumb02.jpg" alt="Popular Post"></a>
                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
                    <em>Posted on 03/01/14</em>
                <li>
                    <a href="#"><img src="assets/img/thumb03.jpg" alt="Popular Post"></a>
                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
                    <em>Posted on 05/16/14</em>
                </li>
                <li>
                    <a href="#"><img src="assets/img/thumb04.jpg" alt="Popular Post"></a>
                    <p><a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit</a></p>
                    <em>Posted on 05/16/14</em>
                </li>
            </ul>

            <div class="spacing"></div>

            <h4>Popular Tags</h4>
            <div class="hline"></div>
            <p>
                <a class="btn btn-theme" href="#" role="button">Design</a>
                <a class="btn btn-theme" href="#" role="button">Wordpress</a>
                <a class="btn btn-theme" href="#" role="button">Flat</a>
                <a class="btn btn-theme" href="#" role="button">Modern</a>
                <a class="btn btn-theme" href="#" role="button">Wallpaper</a>
                <a class="btn btn-theme" href="#" role="button">HTML5</a>
                <a class="btn btn-theme" href="#" role="button">Pre-processor</a>
                <a class="btn btn-theme" href="#" role="button">Developer</a>
                <a class="btn btn-theme" href="#" role="button">Windows</a>
                <a class="btn btn-theme" href="#" role="button">Phothosop</a>
                <a class="btn btn-theme" href="#" role="button">UX</a>
                <a class="btn btn-theme" href="#" role="button">Interface</a>
                <a class="btn btn-theme" href="#" role="button">UI</a>
                <a class="btn btn-theme" href="#" role="button">Blog</a>
            </p>
        </div>
    </div><! --/row -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                @foreach($post->comments as $comment)
                    @if($comment->approved == 1)
                        <div class="comment" style="margin-top: 60px;">
                            <strong>{{ $comment->title }}</strong>
                            <p>{{ $comment->content }}</p>
                        </div>
                    @endif
                @endforeach
        </div>
    </div>
    <h4>Оставить комментарий</h4>
</div><! --/container -->
@include('attachment/layouts/partials/_comment-main')
@endsection

