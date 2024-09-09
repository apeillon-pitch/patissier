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
        @if($section['item_repeater'])
          <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <div class="d-flex flex-column wp-items">
              @foreach($section['item_repeater'] as $item)
                <div class="d-flex flex-row justify-content-between">
                  @if($item['name'])
                    <span class="name">{!! $item['name'] !!}</span>
                  @endif
                  @if($item['quantity'])
                    <span class="quantity ms-2">{!! $item['quantity'] !!}</span>
                  @endif
                </div>
              @endforeach
            </div>
          </div>
        @endif
        @if($section['step_repeater'])
          <div class="col-12 col-lg-8 pt-2">
            <div class="d-flex flex-column justify-content-between wp-steps">
              @foreach($section['step_repeater'] as $step)
                @if($step['text'])
                  <div class="d-flex flex-row">
                    <p>{!! $step['text'] !!}</p>
                  </div>
                @endif
              @endforeach
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
