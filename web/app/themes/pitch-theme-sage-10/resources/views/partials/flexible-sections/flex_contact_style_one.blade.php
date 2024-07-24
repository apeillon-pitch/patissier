@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section contact style-one {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') or is_singular('post') ? '' : 'container' }}">
      <div class="row">
        <div class="col-12 col-lg-9 pe-lg-5">
          @if($section['item_repeater'])
            <div class="d-flex flex-column wp-items">
              @foreach($section['item_repeater'] as $item)
                <div class="wp-item">
                  @if ($item['overtitle_group']['title'])
                    @include('partials.template-parts.title', ['item' => $item['overtitle_group'], 'class' => 'overtitle'])
                  @endif
                  @if ($item['title_group']['title'])
                    @include('partials.template-parts.title', ['item' => $item['title_group'], 'class' => 'section-title style-two large'])
                  @endif
                  @if($item['item_repeater'])
                    <div class="d-flex flex-column wp-list">
                      @foreach($item['item_repeater'] as $item)
                        <div class="d-flex flex-row">
                          @if( $item['icon'])
                            {!! wp_get_attachment_image($item['icon']['id'], 'full', '', array("class" => "img-fluid me-2")) !!}
                          @endif
                          @if( $item['text'])
                            <span>{!!$item['text'] !!}</span>
                          @endif
                        </div>
                      @endforeach
                    </div>
                  @endif
                </div>
              @endforeach
            </div>
          @endif
        </div>
        <div class="col-12 col-lg-3">
          @if($section['widget_social'])
            <div class="d-flex flex-column widget widget-social">
              @if($section['widget_social']['title'])
                <span class="widget-title mb-3">
                  {!! $section['widget_social']['title'] !!}
                </span>
              @endif
              @foreach($section['widget_social']['item_repeater'] as $item)
                <a href="{{ $item['link'] }}" aria-label="{!! $item['text'] !!}" class="d-flex flex-row align-items-center {{ $loop->last === true ? '' : 'mb-2' }}">
                  @if( $item['logo'])
                    {!! wp_get_attachment_image($item['logo']['id'], 'full', '', array("class" => "img-fluid me-2")) !!}
                  @endif
                  @if( $item['text'])
                    <span>{!!$item['text'] !!}</span>
                  @endif
                </a>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
