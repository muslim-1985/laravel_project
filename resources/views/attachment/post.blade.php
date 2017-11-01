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
                {{-- выводим первое изображение из серии так как в блейд нельзя
                       определять переменные то воспользуемся нативным php--}}
                <?php $images = explode(' ',$post->img) ?>
                    <p><img src="{{asset("images/$images[0]" )}}" class="img-responsive" alt="No image" style="width: 50px; height: 50px;"></p>
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

        @include('attachment.layouts.sidebar')
        </div>
    </div><! --/row -->
<div class="container">
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
        <h4>Оставить комментарий</h4>
    </div>
</div>
@include('attachment/layouts/partials/_comment-main')
@endsection

