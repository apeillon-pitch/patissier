@php $options = get_section_options($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section exemple style-one {{ $options['oclasses'] }}">
  <div class="container">
    <div class="d-flex flex-column">
      @if ($section['title_group']['title'])
        @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title'])
      @endif
      @if ($section['text'])
        {!! $section['text'] !!}
      @endif
      @if ($section['cta_group'])
        @include('partials.template-parts.cta', ['item' => $section['cta_group']], ['class' => 'btn-primary'])
      @endif
    </div>
  </div>
</div>
