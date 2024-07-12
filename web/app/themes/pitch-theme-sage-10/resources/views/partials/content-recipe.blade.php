@php
  $title = get_the_title($id);
  $thumbnail = get_field('thumbnail', $id);
  $date = get_the_date('F Y', $id);
  $magazine = get_field('magazine', $id);
@endphp

@if($thumbnail)
  <figure class="cover mb-0">
    {!! wp_get_attachment_image($thumbnail['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
  </figure>
@endif
@if($title)
  <h2 class="title">{!! $title !!}</h2>
@endif
<div class="details">
  #{{ $magazine->name }} | {!! $date !!}
</div>

