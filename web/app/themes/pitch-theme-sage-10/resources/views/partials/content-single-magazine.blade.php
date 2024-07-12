@include('partials.flexible-sections.flex_hero_mag')

@if ($sectionData)
  @php ($row = 1) @endphp
  @foreach($sectionData as $section)
    @include('partials/flexible-sections/' . $section['acf_fc_layout'], ['row' => $row, 'section' => $section])
    @php ($row++) @endphp
  @endforeach
@endif

