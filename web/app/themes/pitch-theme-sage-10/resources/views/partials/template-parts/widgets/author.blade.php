<div class="widget widget-author">
  <div class="d-flex flex-column wp-content">
    @if($data['author']['widget_title'])
      <span class="widget-title">
          {!! $data['author']['widget_title'] !!}
        </span>
    @endif
    <div class="d-flex flex-row wp-content align-items-center">
      @if($data['author']['picture'])
        <figure class="cover mb-0">
          {!! wp_get_attachment_image($data['author']['picture']['id'], 'medium', '', array("class" => "img-fluid w-100")) !!}
        </figure>
      @endif
      <div class="d-flex flex-column">
        @if($data['author']['name'])
          <h3 class="name">{!! $data['author']['name'] !!}</h3>
        @endif
        @if($data['author']['job'])
          <h4 class="job mb-0">{!! $data['author']['job'] !!}</h4>
        @endif
      </div>
    </div>
  </div>
</div>
