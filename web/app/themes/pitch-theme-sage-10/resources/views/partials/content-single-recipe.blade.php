<div class="section-main">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-12 col-lg-8">
        <div class="wp-heading">
          @if($data['thumbnail'])
            <figure class="cover thumbnail">
              {!! wp_get_attachment_image($data['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
            </figure>
          @endif
          @if($data['tag'])
            <span class="overtitle">{!! $data['tag']->name !!}</span>
          @endif
          @if($data['title'])
            <h1 class="section-title">{!! $data['title'] !!}</h1>
          @endif
          @if($data['introduction'])
            <p class="mb-0">{!! $data['introduction'] !!}</p>
          @endif
          @if ($sectionData)
            @php ($row = 1) @endphp
            @foreach($sectionData as $section)
              @include('partials/flexible-sections/' . $section['acf_fc_layout'], ['row' => $row, 'section' => $section])
              @php ($row++) @endphp
            @endforeach
          @endif
        </div>
      </div>
      <div class="col-12 col-lg-4 ps-xl-5">
        <div class="d-flex flex-column wp-widgets">
          @include('partials.template-parts.widgets.author')
          @include('partials.template-parts.widgets.magazine')
          @include('partials.template-parts.widgets.text')
        </div>
      </div>
    </div>
  </div>
</div>
