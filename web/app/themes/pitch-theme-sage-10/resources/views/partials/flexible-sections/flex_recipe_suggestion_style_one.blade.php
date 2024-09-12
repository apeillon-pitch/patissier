@if(isset($section['section_options_group']))
  @php $options = getSectionOptions($section['section_options_group']); @endphp
@endif
@switch($section['source'])
  @case('automatic')
    @php $recipes = getRecipes(4); @endphp
    @break
  @case('manual')
    @php $recipes = $section['recipes']; @endphp
    @break
@endswitch
@if($recipes)
  <div id="section-{{ $row }}"
       class="section recipe-suggestion style-one bg-grey {{ isset($section['section_options_group']) ? $options['oclasses'] : 'pt-default pb-default' }}">
    <div class="inner-section">
      <div class="{{ is_singular('post') ? '' : 'container' }}">
        <div class="row">
          <div class="col-12 text-center">
            @if(isset($section['title_group']))
              @if ($section['title_group']['title'])
                @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two mb-5'])
              @endif
            @else
              @if ($section['title'])
                <h4 class="section-title style-two mb-5">{!! $section['title'] !!}</h4>
              @endif
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

        @if(isset($section['link_repeater']))
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
