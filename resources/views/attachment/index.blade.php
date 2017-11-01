@extends('attachment/layouts/main')
    @section('content')
        <!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->
        <div class="container mtb">
            <div class="row">

                @include('attachment.layouts.post_inner')

                @include('attachment.layouts.sidebar')

                <div class="col-md-offset-5 col-md-6">
                    {{--вывод пагинации--}}
                    {{ $posts->links() }}
                </div>
            </div><! --/row -->
        </div><! --/container -->
    @endsection