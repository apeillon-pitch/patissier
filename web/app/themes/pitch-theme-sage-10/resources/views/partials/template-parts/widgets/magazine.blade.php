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
            @if($global['data']['link_subscribe'])
              @include('partials.template-parts.link', ['item' => $global['data']['link_subscribe'], 'class' => 'btn btn-primary'])
            @endif
              @if($mag['link_discover_mag'])
                @include('partials.template-parts.link', ['item' => $mag['link_discover_mag'], 'class' => 'btn btn-tertiary'])
              @else
                @if($global['data']['link_discover_mag'])
                  @include('partials.template-parts.link', ['item' => $global['data']['link_discover_mag'], 'class' => 'btn btn-tertiary'])
                @endif
              @endif
          </div>
        </div>
      </div>
    </div>
  @endif
@endif
