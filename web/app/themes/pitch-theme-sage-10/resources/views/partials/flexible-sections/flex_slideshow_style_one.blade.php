@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section slideshow style-one {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ (is_singular('recipe') or is_singular('post')) ? '' : 'container' }}">
      @if ($section['title_group']['title'])
        @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two large'])
      @endif
      @if($section['item_repeater'])
        <div class="slideshow">
          @foreach($section['item_repeater'] as $item)
            <div class="slide">
              @if($item['image'])
                <figure class="cover mb-0">
                  {!! wp_get_attachment_image($item['image']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                </figure>
              @endif
              @if($item['text'])
                <div class="wp-text">
                  {!! $item['text'] !!}
                </div>
              @endif
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>

