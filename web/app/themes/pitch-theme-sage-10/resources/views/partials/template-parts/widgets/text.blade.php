@if($data['widget-text']['item_repeater'])
  <div class="widget widget-text">
    <div class="d-flex flex-column wp-content">
      @if($data['widget-text']['title'])
        <span class="widget-title">
          {!! $data['widget-text']['title'] !!}
        </span>
      @endif
      @foreach($data['widget-text']['item_repeater'] as $item)
        <div class="d-flex flex-column">
          <span class="title">
            {!! $item['title'] !!}
          </span>
          <p class="mb-0">
            {!! $item['text'] !!}
          </p>
        </div>
      @endforeach
    </div>
  </div>
@endif
