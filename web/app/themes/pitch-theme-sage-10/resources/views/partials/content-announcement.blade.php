@php
  $title = get_the_title();
  $excerpt = get_field('excerpt');
@endphp
<div class="row justify-content-center">
  <div class="col-12 col-lg-9 col-xxl-8">
    <div class="d-flex flex-column wp-content text-center">

      @if($title)
        <h2 class="title">{!! $title !!}</h2>
      @endif
      @if($excerpt)
        <p>{!! $excerpt !!}</p>
      @endif

    </div>
  </div>
</div>
