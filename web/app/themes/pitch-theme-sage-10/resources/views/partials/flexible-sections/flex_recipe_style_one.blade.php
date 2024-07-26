@php
  $options = getSectionOptions($section['section_options_group']);
@endphp
@switch($section['source'])
  @case('last')
    @php $recipes = getRecipes(1); @endphp
    @break
  @case('last-month')
    @php $recipes = getLastRecipeByTag(3); @endphp
    @break
  @case('last-step-by-step')
    @php $recipes = getLastRecipeByTag(4); @endphp
    @break
  @case('manual')
    @php $recipes = getMagazineById($section['magazine']); @endphp
    @break
@endswitch
@if($recipes)
  @foreach($recipes as $recipe )
    <div id="section-{{ $row }}" class="section image-text style-one {{ $options['oclasses'] }}">
      <div class="inner-section">
        <div class="{{ (is_singular('recipe') or is_singular('post')) ? '' : 'container' }}">
          <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5 {{ $section['position'] === 'left' ? 'order-2' : 'order-2 order-lg-1' }}">
              <div class="d-flex flex-column wp-text">
                <div class="d-flex flex-column wp-heading">
                  <span class="overtitle">{!! $recipe['tag']->name !!}</span>
                  <h2 class="section-title">{!! $recipe['title'] !!}</h2>
                  @if ($recipe['author'])
                    <h3 class="subtitle">par {!! $recipe['author']['name'] !!}</h3>
                  @endif
                </div>
                @if($recipe['excerpt'])
                  <div>
                    {!! $recipe['excerpt'] !!}
                  </div>
                @endif
                @if($recipe['tag']->term_id === 4)
                  @if($recipe['thumbnail_repeater'])
                    <div class="row wp-thumbnails">
                      @foreach($recipe['thumbnail_repeater'] as $item)
                        <div class="col-6 col-sm-4">
                          @if($item['image'])
                            <figure class="cover mb-0">
                              {!! wp_get_attachment_image($item['image']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                            </figure>
                          @endif
                        </div>
                      @endforeach
                    </div>
                  @endif
                @endif
                <div class="d-flex flex-row wp-buttons">
                  @if($recipe['permalink'])
                    @if($recipe['tag'])
                      <a href="{{ $recipe['permalink']  }}" class="btn btn-secondary" aria-label="{!! get_field('link_title', $recipe['tag']) !!}">
                        {!! get_field('link_title', $recipe['tag']) !!}
                      </a>
                    @else
                      <a href="{{ $recipe['permalink']  }}" class="btn btn-secondary" aria-label="Découvrir la recette">
                        Découvrir la recette</a>
                    @endif
                  @endif
                </div>
              </div>
            </div>
            <div
              class="col-12 col-lg-6 mb-4 mb-lg-0 {{ $section['position'] === 'left' ? 'order-1' : 'order-1 order-lg-2' }}">
              @if($recipe['thumbnail'])
                <figure class="cover mb-0 primary style-one">
                  {!! wp_get_attachment_image($recipe['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                </figure>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endif
