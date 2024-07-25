@extends('layouts.app')

@section('content')

  <div class="wp-heading">
    <div class="container">
      <div class="d-flex flex-row justify-content-between">
        <h1 class="section-title">Résultat(s) de votre recherche :</h1>
      </div>
    </div>
  </div>

  <div class="section">
    <div class="container">
      @if (! have_posts())
        <x-alert type="warning">
          {!! __('Sorry, no results were found.', 'sage') !!}
        </x-alert>

        {!! get_search_form(false) !!}
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
