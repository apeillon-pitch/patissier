<div class="section-main">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-12 col-lg-8">
        <div class="d-flex flex-column wp-heading mb-0">
          @if($data['thumbnail'])
            <figure class="cover thumbnail">
              {!! wp_get_attachment_image($data['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
            </figure>
          @endif
          <div class="wp-category d-flex flex-row">
            @if($data['category'])
              <span class="category">{!! $data['category']->name !!}</span>
            @else
              <span class="category">Actualité</span>
            @endif
          </div>
          @if($data['date'])
            <span class="date">{!! $data['date'] !!}</span>
          @endif
          @if($data['title'])
            <h1 class="section-title mb-0">{!! $data['title'] !!}</h1>
          @endif
        </div>

        @if ($sectionData)
          <div class="wp-article-content">
            @php ($row = 1) @endphp
            @foreach($sectionData as $section)
              @include('partials/flexible-sections/' . $section['acf_fc_layout'], ['row' => $row, 'section' => $section])
              @php ($row++) @endphp
            @endforeach
          </div>
        @endif
      </div>
      <div class="col-12 col-lg-4 col-xl-3">
        <div class="d-flex flex-column wp-widgets">
          @include('partials.template-parts.widgets.last-recipes')
          @include('partials.template-parts.widgets.last-magazine')
        </div>
      </div>
    </div>
  </div>
</div>


