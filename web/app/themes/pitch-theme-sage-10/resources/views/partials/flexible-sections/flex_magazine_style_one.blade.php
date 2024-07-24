@php
  $options = getSectionOptions($section['section_options_group']);
  $magazines = getMagazines(1);
@endphp
@switch($section['source'])
  @case('last')
    @php $magazines = getMagazines(1); @endphp
  @break
  @case('manual')
    @php $magazines = getMagazineById($section['magazine']); @endphp
    @break
@endswitch
@if($magazines)
  @foreach($magazines as $magazine )
    <div id="section-{{ $row }}" class="section image-text style-one {{ $options['oclasses'] }}">
      <div class="inner-section">
        <div class="{{ (is_singular('recipe') or is_singular('post')) ? '' : 'container' }}">
          <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5 {{ $section['position'] === 'left' ? 'order-2' : 'order-2 order-lg-1' }}">
              <div class="d-flex flex-column wp-text">
                <div class="d-flex flex-column wp-heading">
                  <span class="overtitle">#{!! $magazine['magazine']->name !!} | {!! $magazine['date'] !!}</span>
                  <h2 class="section-title">{!! $magazine['title'] !!}</h2>
                </div>
                @if($magazine['excerpt'])
                  <div>
                    {!! $magazine['excerpt'] !!}
                  </div>
                @endif
                <div class="d-flex flex-row wp-buttons">
                  @if($global['data']['link_subscribe'])
                    @include('partials.template-parts.link', ['item' => $global['data']['link_subscribe'], 'class' => 'btn btn-primary'])
                  @endif
                  @if($global['data']['link_discover_mag'])
                    @include('partials.template-parts.link', ['item' => $global['data']['link_discover_mag'], 'class' => 'btn btn-tertiary'])
                  @endif
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 mb-4 mb-lg-0 {{ $section['position'] === 'left' ? 'order-1' : 'order-1 order-lg-2' }}">
              @if($magazine['thumbnail'] && empty($magazine['recipes']))
                <figure class="cover mb-0 primary style-one">
                  {!! wp_get_attachment_image($magazine['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                </figure>
              @elseif($magazine['thumbnail'] && count($magazine['recipes']) === 1 )
                <div class="row">
                  <div class="col-12">
                    <figure class="mb-0 primary">
                      {!! wp_get_attachment_image($magazine['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                    </figure>
                  </div>
                  @foreach($magazine['recipes'] as $item)
                    <div class="col-12">
                      <figure class="mb-0 primary">
                        {!! wp_get_attachment_image($item['image']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                      </figure>
                    </div>
                  @endforeach
                </div>
              @elseif($magazine['thumbnail'] && count($magazine['recipes']) === 2 )
                <div class="row">
                  <div class="col-8">
                    @if($magazine['thumbnail'])
                      <figure class="mb-0 primary">
                        {!! wp_get_attachment_image($magazine['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                      </figure>
                    @endif
                  </div>
                  <div class="col-4">
                    <div class="d-flex flex-column justify-content-between h-100">
                      @foreach($magazine['recipes'] as $item)
                        @if($item['image'])
                          <div class="wp-item">
                            <figure class="cover secondary">
                              {!! wp_get_attachment_image($item['image']['id'], 'medium', '', array("class" => "img-fluid")) !!}
                            </figure>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endif
