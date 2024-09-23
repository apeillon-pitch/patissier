<header id="o-wrapper" class="banner">
  <div class="wp-top-bar">
    <div class="container">
      <div class="d-flex flex-row justify-content-between align-items-center">
        <div class="d-flex d-lg-none">
          <div id="menu-button">
            <div class="c-buttons">
              <a href="#" rel="nofollow noindex" id="c-button--slide-right" aria-label="Menu"
                 class="hamburger c-button">
                <div class="top-bun"></div>
                <div class="meat"></div>
                <div class="bottom-bun"></div>
              </a>
            </div>
          </div>
        </div>
        <div class="d-none d-lg-block">
          <a href="#" class="link-icon" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="fa-regular fa-magnifying-glass"></i>
          </a>
        </div>
        <div class="d-none d-lg-flex flex-row wp-links-desktop align-items-center">
          @if($footer['data']['widget_newsletter']['fom_id'])
            <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#newsletterModal">
              Newsletter
            </a>
          @endif
          @if($header['data']['link_repeater'])
            @foreach($header['data']['link_repeater'] as $item)
              <a href="{{ $item['link']['url'] }}"
                 class="link"
                 aria-label="{!! $item['link']['title'] !!}"
                 target="{!! $item['link']['target'] !!}">
                {!! $item['link']['title'] !!}
              </a>
            @endforeach
          @endif
          @if($header['data']['facebook'])
            <a href="{!! $header['data']['facebook']['url'] !!}"
               aria-label="{!! $header['data']['facebook']['title'] !!}"
               target="{!! $header['data']['facebook']['target'] !!}">
              <i class="fa-brands fa-square-facebook"></i>
            </a>
          @endif
          @if($header['data']['instagram'])
            <a href="{!! $header['data']['instagram']['url'] !!}"
               aria-label="{!! $header['data']['instagram']['title'] !!}"
               target="{!! $header['data']['instagram']['target'] !!}">
              <i class="fa-brands fa-square-instagram"></i>
            </a>
          @endif
        </div>
        <div class="d-flex d-lg-none flex-row wp-links-mobile align-items-center">
          <i class="fa-regular fa-magnifying-glass"></i>
          @if($header['data']['widget_group']['link'])
            @include('partials.template-parts.link', ['item' => $header['data']['widget_group']['link'], 'class' => 'btn btn-primary'])
          @endif
        </div>
      </div>
    </div>
  </div>
  <div class="wp-logos">
    <div class="container">
      <div class="d-flex flex-row justify-content-between align-items-center gx-0">
        @if ($header['data']['confederation_group']['logo'])
          <div class="wp-block order-2 order-lg-1 text-end text-lg-start">
            @if($header['data']['confederation_group']['link'])
              <a href="{{ $header['data']['confederation_group']['link']['url'] }}"
                 aria-label="{!! $header['data']['confederation_group']['link']['title'] !!}"
                 target="{{ $header['data']['confederation_group']['link']['target'] }}">
                {!! wp_get_attachment_image( $header['data']['confederation_group']['logo']['id'], 'medium','', array( "class" => "img-fluid")) !!}
              </a>
            @else
              {!! wp_get_attachment_image( $header['data']['confederation_group']['logo']['id'], 'medium','', array( "class" => "img-fluid")) !!}
            @endif
          </div>
        @endif
        @if ($header['data']['logo'])
          <div class="wp-block order-1 order-lg-2">
            <a href="{{ home_url() }}" aria-label="Accueil">
              {!! wp_get_attachment_image( $header['data']['logo']['id'], 'medium','', array( "class" => "d-block mx-auto")) !!}
            </a>
          </div>
        @endif
        @if ($header['data']['widget_group']['image'])
          <div class="wp-block d-none d-lg-block order-lg-3">
            <div class="d-flex flex-row align-items-center justify-content-end wp-widget">
              <figure class="cover mb-0">
                {!! wp_get_attachment_image( $header['data']['widget_group']['image']['id'], 'medium','', array( "class" => "")) !!}
              </figure>
              <div class="d-flex flex-column">
                @if($header['data']['widget_group']['title'] && $global['data']['link_discover_mag'])
                  <span class="mb-2">
                    <a href="{{ $global['data']['link_discover_mag']['url'] }}" aria-label="{!! $header['data']['widget_group']['title'] !!}" class="link" target="{{ $global['data']['link_discover_mag']['target'] }}">
                    {!! $header['data']['widget_group']['title'] !!}
                    </a>
                  </span>
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
    <div id="nav-wrapper" class="d-none d-lg-block p-0">
      <div class="container">
        <nav class="nav-primary navbar navbar-expand-lg justify-content-center">
          {!! wp_nav_menu($mainMenu) !!}
        </nav>
      </div>
    </div>
  @endif
</header>
