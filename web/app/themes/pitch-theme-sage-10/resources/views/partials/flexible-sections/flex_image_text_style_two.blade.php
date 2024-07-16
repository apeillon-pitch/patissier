@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section image-text style-two {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') ? '' : 'container' }}">
      <div class="row">
        <div class="col-12 col-lg-6 {{ $section['position'] === 'left' ? 'order-1' : 'order-1 order-lg-2' }}">
          <div class="d-flex flex-column wp-heading">
            @if ($section['overtitle_group']['title'])
              @include('partials.template-parts.title', ['item' => $section['overtitle_group'], 'class' => 'overtitle'])
            @endif
            @if ($section['title_group']['title'])
              @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two large'])
            @endif
          </div>
        </div>
      </div>
      <div class="row align-items-{{ $section['alignment'] }}">
        <div
          class="col-12 col-lg-6 {{ $section['position'] === 'left' ? 'order-2 offset-lg-1' : 'order-2 order-lg-1' }}">
          <div class="d-flex flex-column wp-text">
            @if($section['text'])
              <div>
                {!! $section['text'] !!}
              </div>
            @endif
            @if($section['link_repeater'])
              <div class="d-flex flex-row wp-buttons">
                @foreach($section['link_repeater'] as $item)
                  @include('partials.template-parts.link', ['item' => $item['link'], 'class' => 'btn btn-' . $item['style']])
                @endforeach
              </div>
            @endif
          </div>
        </div>
        <div
          class="col-12 col-lg-5 mb-4 mb-lg-0 {{ $section['position'] === 'left' ? 'order-1' : 'order-1 order-lg-2 offset-lg-1' }}">
          @if($section['image_repeater'])
            @foreach($section['image_repeater'] as $item)
              <figure class="{{ $section['size'] === 'contained' ? 'cover' : '' }} mb-0">
                {!! wp_get_attachment_image($item['image']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
              </figure>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
