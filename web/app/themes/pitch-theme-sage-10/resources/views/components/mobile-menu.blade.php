<nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
  <div class="container">
    <div class="d-flex flex-row justify-content-end align-items-center mt-4">
      <button title="Fermer le menu" class="c-menu__close">
        <i class="fa-light fa-xmark"></i>
      </button>
    </div>
    <nav id="navbar-mobile" class="nav-primary navbar">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu($mainMenu) !!}
      @endif
    </nav>
    <div class="d-flex flex-column mt-4 pt-4 pb-4 border-1 wp-links-desktop align-items-center">
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
    </div>
    <div class="d-flex flex-row justify-content-center wp-social">
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
</nav>
<div id="c-mask" class="c-mask"></div>
