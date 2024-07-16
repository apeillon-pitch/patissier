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
</nav>
<div id="c-mask" class="c-mask"></div>
