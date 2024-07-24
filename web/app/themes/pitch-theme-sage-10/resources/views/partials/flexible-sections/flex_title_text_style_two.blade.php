@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section title-text style-two {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') or is_singular('post') ? '' : 'container' }}">
      <div class="d-flex flex-column wp-content">
        <div class="d-flex flex-column wp-heading">
          @if ($section['overtitle_group']['title'])
            @include('partials.template-parts.title', ['item' => $section['overtitle_group'], 'class' => 'overtitle style-two'])
          @endif
          @if ($section['title_group']['title'])
            @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title'])
          @endif
        </div>
        @if($section['text'])
          <div class="wp-text">
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
  </div>
</div>
