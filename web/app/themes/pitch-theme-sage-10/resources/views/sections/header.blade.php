<header id="o-wrapper" class="banner">
  <div class="container">
    <div class="d-flex flex-row justify-content-between align-items-center gx-0">
      @if ($header['data'])
        <div class="d-block">
          <a href="{{ home_url() }}" aria-label="Accueil">
            <img src="{{ $header['data']['logo']['url'] }}"
                 alt="{!! $header['data']['logo']['alt'] !!}"
                 height="36px"
                 width="auto">
          </a>
        </div>
      @endif
      @if (has_nav_menu('primary_navigation'))
        <div id="nav-wrapper" class="d-none d-xl-block p-0">
          <nav class="nav-primary navbar navbar-expand-xl justify-content-end">
            {!! wp_nav_menu($mainMenu) !!}
          </nav>
        </div>
      @endif
      <div class="d-flex flex-row align-items-center">
        {!! do_shortcode('[wpml_language_selector_widget]') !!}
        <div class="d-flex d-xl-none">
          <div id="menu-button">
            <div class="c-buttons">
              <a href="#" rel="nofollow noindex" id="c-button--slide-right" aria-label="Menu" class="hamburger c-button">
                <div class="top-bun"></div>
                <div class="meat"></div>
                <div class="bottom-bun"></div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
