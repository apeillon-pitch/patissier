<div class="section hero-mag pb-0">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-12 col-lg-7">
        <div class="d-flex flex-column">
          <h1 class="section-title">#{!! $data['number'] !!} | {{ $data['date'] }}
            <br> <strong>{!! $data['title'] !!}</strong>
          </h1>
          @if($data['introduction'])
            {!! $data['introduction'] !!}
          @endif
          @if($data['recipes'])
            <div class="row wp-recipes">
              @foreach($data['recipes'] as $recipe)
                @php $recipe = getRecipeById($recipe); @endphp
                @if($recipe)
                  <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <div class="card-recipe style-three">
                      @if($recipe['thumbnail'])
                        <figure class="cover mb-0">
                          @if($recipe['tag'])
                            <span class="tag">{!! $recipe['tag']->name !!}</span>
                          @endif
                          {!! wp_get_attachment_image($recipe['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
                        </figure>
                      @endif
                      <div class="d-flex flex-row justify-content-between align-items-center">
                        <div class="d-flex flex-column">
                          @if($recipe['title'])
                            <h2 class="title">{!! $recipe['title'] !!}</h2>
                          @endif
                          @if($recipe['author']['name'])
                            <div class="details">
                              par {!! $recipe['author']['name'] !!}
                            </div>
                          @endif
                        </div>
                        <a href="{{ $recipe['permalink'] }}" class="btn btn-primary"
                           aria-label="{!! $recipe['title'] !!}" target="_self">+</a>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
            </div>
          @endif
        </div>
      </div>
      <div class="col-12 col-lg-4 mt-4 mt-lg-0">
        @if($data['thumbnail'])
          <figure class="cover mag mb-0">
            {!! wp_get_attachment_image($data['thumbnail']['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
          </figure>
        @endif
        <div class="d-flex flex-row wp-buttons">
          @if($global['data']['link_subscribe'])
            @include('partials.template-parts.link', ['item' => $global['data']['link_subscribe'], 'class' => 'btn btn-primary'])
          @endif
          @if($data['link_discover_mag'])
            @include('partials.template-parts.link', ['item' => $data['link_discover_mag'], 'class' => 'btn btn-tertiary'])
          @else
            @if($global['data']['link_discover_mag'])
              @include('partials.template-parts.link', ['item' => $global['data']['link_discover_mag'], 'class' => 'btn btn-tertiary'])
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
