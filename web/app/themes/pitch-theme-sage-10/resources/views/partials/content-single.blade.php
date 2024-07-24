<div class="section">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-12 col-lg-8">
        <div class="wp-heading">
          @if($data['thumbnail'])
            <figure class="cover thumbnail">
              {!! wp_get_attachment_image($data['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
            </figure>
          @endif
          @if($data['title'])
            <h1 class="section-title">{!! $data['title'] !!}</h1>
          @endif
          @if ($data['content'])
           {!! $data['content'] !!}
          @endif
        </div>
      </div>
      <div class="col-12 col-lg-4 col-xl-3">
        <div class="d-flex flex-column wp-widgets">
          
        </div>
      </div>
    </div>
  </div>
</div>
