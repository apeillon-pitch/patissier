<div class="wp-heading-single">
  <div class="container">
    <div class="d-flex flex-row justify-content-between">
      <span class="section-title">Le numéro du mois</span>

      @php $id = get_the_ID(); $mags = getMagazines(-1) @endphp
      <select id="mag-filter">
        @foreach($mags as $mag)
          <option
            value="{{ $mag['permalink'] }}" {{ $id === $mag['id'] ? 'selected' : '' }}>
            #{!! $mag['magazine']->name !!} | {!! $mag['date_short'] !!}</option>
        @endforeach
      </select>
    </div>
  </div>
</div>

@include('partials.flexible-sections.flex_hero_mag')

@if ($sectionData)
  @php ($row = 1) @endphp
  @foreach($sectionData as $section)
    @include('partials/flexible-sections/' . $section['acf_fc_layout'], ['row' => $row, 'section' => $section])
    @php ($row++) @endphp
  @endforeach
@endif

