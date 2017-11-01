
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