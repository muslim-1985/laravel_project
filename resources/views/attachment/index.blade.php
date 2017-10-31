@extends('attachment/layouts/main')
    @section('content')
        <!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->

        <div class="container mtb">
            <div class="row">

                <! -- BLOG POSTS LIST -->
                <div class="col-lg-8">
                    @foreach($posts as $post)
                        <p>
                            {{-- выводим первое изображение из серии так как в блейд нельзя
                                   определять переменные то воспользуемся нативным php--}}
                            <?php $images = explode(' ',$post->img) ?>
                            <img src="{{ asset("images/$images[0]") }}" alt="no image">
                        </p>
                        <a href="{{ route('post.single',$post->id) }}"><h3 class="ctitle">{{ $post->title }}</h3></a>
                        <p><csmall>Posted: {{ $post->created_at }}</csmall> | <csmall2>By: Admin - {{ count($post->comments) }} Comments</csmall2></p>
                        <p>{{ $post->desc }}</p>
                        <p><a href="{{ route('post.single',$post->id) }}">[Read More]</a></p>
                        <div class="hline"></div>

                        <div class="spacing"></div>
                    @endforeach
                </div><! --/col-lg-8 -->


                <! -- SIDEBAR -->
                <div class="col-lg-4">

                    <div class="spacing"></div>

                    <h4>Categories</h4>
                    <div class="hline"></div>
                    @foreach($categories as $cat)
                        <p>
                            <a href="#"><i class="fa fa-angle-right"></i>{{ $cat->title }}</a>
                            <span class="badge badge-theme pull-right">{{ count($cat->posts) }}</span>
                        </p>
                    @endforeach

                    <div class="spacing"></div>

                    <h4>All Tags</h4>
                    <div class="hline"></div>
                    <p>
                        @foreach($tags as $tag)
                            <a class="btn btn-theme" href="#" role="button">{{ $tag->title }}</a>
                        @endforeach

                    </p>
                </div>
                <div class="col-md-offset-5 col-md-6">
                    {{--вывод пагинации--}}
                    {{ $posts->links() }}
                </div>
            </div><! --/row -->
        </div><! --/container -->
    @endsection