@if($data['magazine'])
  @php $mag = getMagazineByCategory($data['magazine']->term_id) @endphp
  @if($mag)
    <div class="widget widget-magazine">
      <div class="d-flex flex-row wp-content align-items-center">
        @if($mag['thumbnail'])
          <figure class="cover mb-0">
            {!! wp_get_attachment_image($mag['thumbnail']['id'], 'medium', '', array("class" => "img-fluid w-100")) !!}
          </figure>
        @endif
        <div class="d-flex flex-column">
          <h3 class="name">{!! $widgets['widget_magazine']['title'] !!} {!! $data['magazine']->name !!}</h3>
          <div class="wp-cta">
            <a href="" class="btn btn-primary" aria-label="S'abonner" target="_self">S'abonner</a>
            <a href="" class="btn btn-tertiary" aria-label="Découvrir le magazine" target="_self">Découvrir le
              magazine</a>
          </div>
        </div>
      </div>
    </div>
  @endif
@endif
