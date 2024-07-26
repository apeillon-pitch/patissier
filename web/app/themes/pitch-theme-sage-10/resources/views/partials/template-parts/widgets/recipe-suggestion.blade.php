@switch($data['widget-recipe']['source'])
  @case('automatic')
    @php $recipes = getRecipes(4); @endphp
    @break
  @case('manual')
    @php $recipes = $data['widget-recipe']['recipes']; @endphp
    @break
@endswitch
@if($recipes)
  <div class="widget widget-recipe-suggestion">
    <div class="row gy-4">
      <div class="col-12">
        @if($data['widget-recipe']['title'])
          <span class="widget-title">
            {!! $data['widget-recipe']['title'] !!}
          </span>
        @endif
      </div>
      @foreach($recipes as $item)
        @if($data['widget-recipe']['source'] == 'manual')
          @php $post = getRecipeById($item->id); $item = $post['0'];  @endphp
        @endif
        <div class="col-6">
          <a href="{{ $item['permalink'] }}" aria-label="{!! $item['title'] !!}" target="_self"
             class="card-recipe style-four">
            @if($item['thumbnail'])
              <figure class="cover mb-0">
                {!! wp_get_attachment_image($item['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
              </figure>
            @endif
            @if($item['title'])
              <h2 class="title">{!! $item['title'] !!}</h2>
            @endif
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endif
