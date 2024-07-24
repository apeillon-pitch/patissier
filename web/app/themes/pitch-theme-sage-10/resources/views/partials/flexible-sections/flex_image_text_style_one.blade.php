@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section image-text style-one {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') or is_singular('post') ? '' : 'container' }}">
      <div class="row align-items-center justify-content-between">
        <div class="col-12 col-lg-5 {{ $section['position'] === 'left' ? 'order-2' : 'order-2 order-lg-1' }}">
          <div class="d-flex flex-column wp-text">
            <div class="d-flex flex-column wp-heading">
              @if ($section['overtitle_group']['title'])
                @include('partials.template-parts.title', ['item' => $section['overtitle_group'], 'class' => 'overtitle'])
              @endif
              @if ($section['title_group']['title'])
                @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title'])
              @endif
              @if ($section['subtitle_group']['title'])
                @include('partials.template-parts.title', ['item' => $section['subtitle_group'], 'class' => 'subtitle'])
              @endif
            </div>
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
        <div class="col-12 col-lg-6 mb-4 mb-lg-0 {{ $section['position'] === 'left' ? 'order-1' : 'order-1 order-lg-2' }}">
          @if($section['image_repeater'])
            @php $c = count($section['image_repeater']); @endphp
            @if($c === 1)
              @foreach($section['image_repeater'] as $item)
                <figure class="cover mb-0 primary style-one">
                  {!! wp_get_attachment_image($item['image']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                </figure>
              @endforeach
            @elseif($c === 2 )
              <div class="row">
                @foreach($section['image_repeater'] as $item)
                  <div class="col-12">
                    <figure class="mb-0 primary">
                      {!! wp_get_attachment_image($item['image']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                    </figure>
                  </div>
                @endforeach
              </div>
            @elseif($c === 3 )
              <div class="row">
                <div class="col-8">
                  @foreach($section['image_repeater'] as $index => $item)
                    @if($index === 0)
                      @if($item['image'])
                        <figure class="mb-0 primary">
                          {!! wp_get_attachment_image($item['image']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                        </figure>
                      @endif
                    @endif
                  @endforeach
                </div>
                <div class="col-4">
                  <div class="d-flex flex-column justify-content-between h-100">
                    @foreach($section['image_repeater'] as $index => $item)
                      @if($index >= 1)
                        @if($item['image'])
                          <div class="wp-item">
                            <figure class="cover secondary">
                              {!! wp_get_attachment_image($item['image']['id'], 'medium', '', array("class" => "img-fluid")) !!}
                            </figure>
                          </div>
                        @endif
                      @endif
                    @endforeach
                  </div>
                </div>
              </div>
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
