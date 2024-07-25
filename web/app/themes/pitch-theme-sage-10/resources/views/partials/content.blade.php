@php
  $title = get_the_title();
  $excerpt = get_field('excerpt');
  $thumbnail = get_field('thumbnail');
  $permalink = get_the_permalink();
@endphp
<div class="row justify-content-center">
  <div class="col-12 col-lg-4 col-xxl-3 mb-4 mb-lg-0">
    <figure class="cover mb-0">
      @if($thumbnail)
        {!! wp_get_attachment_image($thumbnail['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
      @else
        <img src="@asset('../../images/thumb-annonce.jpg')" alt="Image de l'annonce" width="307px" height="241.6px"
             class="img-fluid">
      @endif
    </figure>
  </div>
  <div class="col-12 col-lg-8 col-xxl-9">
    <div class="d-flex flex-column wp-content">
      @if($title)
        <h2 class="title mt-2 mb-4">{!! $title !!}</h2>
      @endif
      @if($excerpt)
        <p>{!! $excerpt !!}</p>
      @endif
      @if($permalink)
        <div class="d-flex flex-row">
        <a href="{{ $permalink }}" class="btn btn-tertiary" aria-label="Lire l'article">Lire l'article</a>
        </div>
      @endif
    </div>
  </div>
</div>
