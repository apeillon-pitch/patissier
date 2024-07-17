@php $options = getSectionOptions($section['section_options_group']); @endphp
@switch($section['source'])
  @case('automatic')
    @php $recipes = getRecipes(4); @endphp
    @break
  @case('manual')
    @php $recipes = $section['recipes']; @endphp
    @break
@endswitch
@if($recipes)
  <div id="section-{{ $row }}" class="section recipe-suggestion style-one bg-grey {{ $options['oclasses'] }}">
    <div class="inner-section">
      <div class="{{ is_singular('recipe') ? '' : 'container' }}">
        <div class="row">
          <div class="col-12 text-center">
            @if ($section['title_group']['title'])
              @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two mb-5'])
            @endif
          </div>
          @foreach($recipes as $item)
            @if($section['source'] == 'manual')
              @php $post = getRecipeById($item->id); $item = $post['0'];  @endphp
            @endif
            <div class="col-6 col-lg-3 mb-4 mb-lg-0">
              <a href="{{ $item['permalink'] }}" aria-label="{!! $item['title'] !!}" target="_self"
                 class="card-recipe style-one">
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

        @if($section['link_repeater'])
          <div class="d-flex flex-row justify-content-center wp-buttons mt-5">
            @foreach($section['link_repeater'] as $item)
              @include('partials.template-parts.link', ['item' => $item['link'], 'class' => 'btn btn-' . $item['style']])
            @endforeach
          </div>
        @endif

      </div>
    </div>
  </div>
@endif
