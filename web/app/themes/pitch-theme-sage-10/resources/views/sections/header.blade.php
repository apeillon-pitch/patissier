<header id="o-wrapper" class="banner">
  <div class="wp-logos">
    <div class="container">
      <div class="d-flex flex-row justify-content-between align-items-center gx-0">
        @if ($header['data']['confederation_group']['logo'])
          <div class="wp-block">
            @if($header['data']['confederation_group']['link'])
              <a href="{{ $header['data']['confederation_group']['link']['url'] }}"
                 aria-label="{!! $header['data']['confederation_group']['link']['title'] !!}"
                 target="{{ $header['data']['confederation_group']['link']['target'] }}">
                {!! wp_get_attachment_image( $header['data']['confederation_group']['logo']['id'], 'medium','', array( "class" => "")) !!}
              </a>
            @else
              {!! wp_get_attachment_image( $header['data']['confederation_group']['logo']['id'], 'medium','', array( "class" => "")) !!}
            @endif
          </div>
        @endif
        @if ($header['data']['logo'])
          <div class="wp-block">
            <a href="{{ home_url() }}" aria-label="Accueil">
              {!! wp_get_attachment_image( $header['data']['logo']['id'], 'medium','', array( "class" => "")) !!}
            </a>
          </div>
        @endif
        @if ($header['data']['widget_group']['image'])
          <div class="wp-block">
            <div class="d-flex flex-row align-items-center justify-content-end wp-widget">
              <figure class="cover mb-0">
                {!! wp_get_attachment_image( $header['data']['widget_group']['image']['id'], 'medium','', array( "class" => "")) !!}
              </figure>
              <div class="d-flex flex-column">
                @if($header['data']['widget_group']['title'])
                  <span class="mb-2">{!! $header['data']['widget_group']['title'] !!}</span>
                @endif
                @if($header['data']['widget_group']['link'])
                  @include('partials.template-parts.link', ['item' => $header['data']['widget_group']['link'], 'class' => 'btn btn-primary'])
                @endif
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>

  @if (has_nav_menu('primary_navigation'))
    <div id="nav-wrapper" class="d-none d-xl-block p-0">
      <div class="container">
        <nav class="nav-primary navbar navbar-expand-xl justify-content-center">
          {!! wp_nav_menu($mainMenu) !!}
        </nav>
      </div>
    </div>
  @endif
</header>
