@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section form style-one bg-grey {{ $options['oclasses'] }}">
  <div class="inner-section">
    <div class="{{ is_singular('recipe') ? '' : 'container' }}">
      <div class="row align-items-center">
        <div class="col-12">
          @if ($section['title_group']['title'])
            @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two large'])
          @endif
        </div>
        <div class="col-12">
          @if($section['form_id'])
            <div>
              {{ gravity_form( $section['form_id'], false, false, false, '', true, 12 )  }}
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
</div>
