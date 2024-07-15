@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section accordion style-one {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') ? '' : 'container' }}">
      @if ($section['title_group']['title'])
        @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two large'])
      @endif
      @if($section['item_repeater'])
        <div class="accordion" id="accordion-{{ $row }}">
          @foreach($section['item_repeater'] as $item)
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $row }}-{{ $loop->iteration }}" aria-expanded="false"
                        aria-controls="collapse-{{ $row }}-{{ $loop->iteration }}">
                  {!! $item['title']  !!}
                </button>
              </h2>
              <div id="collapse-{{ $row }}-{{ $loop->iteration }}" class="accordion-collapse collapse"
                   data-bs-parent="#accordion-{{ $row }}">
                <div class="accordion-body">
                  {!! $item['text']  !!}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>
</div>

