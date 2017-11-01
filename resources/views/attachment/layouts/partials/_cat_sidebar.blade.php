<div class="spacing"></div>

<h4>Categories</h4>
<div class="hline"></div>
@foreach($categories as $cat)
    <p>
        <a href="#"><i class="fa fa-angle-right"></i>{{ $cat->title }}</a>
        <span class="badge badge-theme pull-right">{{ count($cat->posts) }}</span>
    </p>
@endforeach