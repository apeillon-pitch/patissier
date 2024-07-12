@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section title-recipe style-two {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') ? '' : 'container' }}">
      <div class="row">
        <div class="col-12">
          @if ($section['title_group']['title'])
            @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two mb-4'])
          @endif
        </div>
      </div>
      <div class="row wp-list">
        @foreach($section['recipe_repeater'] as $item)
          <div class="col-12 col-lg-6">
            <div class="d-flex flex-column">
              <h3 class="name">{!! $item['name'] !!}</h3>
              <div class="wp-details d-flex flex-column">
                <strong class="author">{!! $item['author'] !!}</strong>
                <span class="job">{!! $item['job'] !!}</span>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
