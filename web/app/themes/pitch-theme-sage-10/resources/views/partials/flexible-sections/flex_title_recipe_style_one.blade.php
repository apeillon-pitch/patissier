@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section title-recipe style-one {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ (is_singular('recipe') or is_singular('post')) ? '' : 'container' }}">
      <div class="row">
        <div class="col-12">
          @if ($section['title_group']['title'])
            @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title'])
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-4">
          <div class="d-flex flex-column wp-items">
            @foreach($section['item_repeater'] as $item)
              <div class="d-flex flex-row justify-content-between">
                <span class="name">{!! $item['name'] !!}</span>
                <span class="quantity">{!! $item['quantity'] !!}</span>
              </div>
            @endforeach
          </div>
        </div>
        <div class="col-12 col-lg-8 pt-2">
          <div class="d-flex flex-column justify-content-between wp-steps">
            @foreach($section['step_repeater'] as $step)
              <div class="d-flex flex-row">
                <p>{!! $step['text'] !!}</p>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
