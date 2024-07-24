@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section title-iframe style-one {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') or is_singular('post') ? '' : 'container' }}">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-9 col-xxl-8">
          <div class="d-flex flex-column wp-content">
            <div class="d-flex flex-column wp-heading">
              @if ($section['overtitle_group']['title'])
                @include('partials.template-parts.title', ['item' => $section['overtitle_group'], 'class' => 'overtitle'])
              @endif
              @if ($section['title_group']['title'])
                @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title'])
              @endif
            </div>
            @if($section['iframe'])
              {!! $section['iframe'] !!}
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
