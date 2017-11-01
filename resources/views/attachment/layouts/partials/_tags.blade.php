<div class="spacing"></div>

<h4>All Tags</h4>
<div class="hline"></div>
<p>
    @foreach($tags as $tag)
        <a class="btn btn-theme" href="#" role="button">{{ $tag->title }}</a>
    @endforeach

</p>