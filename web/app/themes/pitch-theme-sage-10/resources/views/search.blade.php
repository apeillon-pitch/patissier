@extends('layouts.app')

@section('content')

  <div class="wp-heading">
    <div class="container">
      <div class="d-flex flex-row justify-content-between">
        <h1 class="section-title">{!! $global['data']['search_result_title'] !!}</h1>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="container">
      @if (! have_posts())
        <x-alert type="warning">
          @if( (ICL_LANGUAGE_CODE =='en' ))
            Sorry, no results were found.
          @else
            Désolé, aucun résultat n'a été trouvé.
          @endif
        </x-alert>

        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
          <label>
            <span class="screen-reader-text"><?php esc_html_e('Search for:', 'jdp'); ?></span>
            <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search …', 'jdp'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
          </label>
          <button type="submit" class="search-submit"><?php esc_html_e('Search', 'jdp'); ?></button>
        </form>

      @endif

      <div class="d-flex flex-column">
        @while(have_posts())
          @php(the_post())
          @include('partials.content-search')
        @endwhile
      </div>

      {!! get_the_posts_navigation() !!}
    </div>
  </div>
@endsection
