@php
  $title = get_the_title();
  $episod = get_field('episod');
  $excerpt = get_field('excerpt');
  $iframe = get_field('iframe')
@endphp
<div class="row justify-content-center">
  <div class="col-12 col-lg-9 col-xxl-8">
    <div class="d-flex flex-column wp-content text-center">
      @if($episod)
        <strong class="overtitle">Épisode #{!! $episod !!}</strong>
      @endif
      @if($title)
        <h2 class="title">{!! $title !!}</h2>
      @endif
      @if($excerpt)
        <p>{!! $excerpt !!}</p>
      @endif
      @if($iframe)
        {!! $iframe !!}
      @endif
    </div>
  </div>
</div>
