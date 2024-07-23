@php
  $title = get_the_title();
  $excerpt = get_field('excerpt');
  $thumbnail = get_field('thumbnail');
@endphp
<div class="row justify-content-center">
  <div class="col-12 col-lg-3 col-xxl-4">
    <figure class="cover mb-0" style="height: 240px">
      @if($thumbnail)
        {!! wp_get_attachment_image($thumbnail['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
      @else
        <img src="@asset('../../images/thumb-annonce.jpg')" alt="">
      @endif
    </figure>
  </div>
  <div class="col-12 col-lg-9 col-xxl-8">
    <div class="d-flex flex-column wp-content">

      @if($title)
        <h2 class="title">{!! $title !!}</h2>
      @endif
      @if($excerpt)
        <p>{!! $excerpt !!}</p>
      @endif

    </div>
  </div>
</div>
