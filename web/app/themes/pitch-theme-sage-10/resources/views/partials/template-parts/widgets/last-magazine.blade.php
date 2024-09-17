  @php $mag = getMagazines(1) @endphp
  @if($mag)
    <div class="widget widget-magazine">
      <div class="d-flex flex-row wp-content align-items-center">
        @if($mag[0]['thumbnail'])
          <figure class="cover mb-0">
            {!! wp_get_attachment_image($mag[0]['thumbnail']['id'], 'medium', '', array("class" => "img-fluid w-100")) !!}
          </figure>
        @endif
        <div class="d-flex flex-column">
          <h3 class="name">Magazine #{!! $mag[0]['magazine']->name !!}</h3>
          <div class="wp-cta">
            @if($global['data']['link_subscribe'])
              <a href="{{ $global['data']['link_subscribe']['url'] }}" class="btn btn-primary" aria-label="{!! $global['data']['link_subscribe']['title'] !!}"
                 target="_self">{!! $global['data']['link_subscribe']['title'] !!}</a>
            @endif
            @if($global['data']['link_discover_mag'])
              <a href="{{ $global['data']['link_discover_mag']['url'] }}" class="btn btn-tertiary"
                 aria-label="{!!  $global['data']['link_discover_mag']['title'] !!}" target="_self">{!!  $global['data']['link_discover_mag']['title'] !!}</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  @endif
