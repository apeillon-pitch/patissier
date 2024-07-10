@extends('layouts.app')

@section('content')

  <div class="wp-heading">
    <div class="container">
      <div class="d-flex flex-row justify-content-between">
        <h1 class="section-title">@lejournaldupatissier</h1>
      </div>
    </div>

  </div>

  @if (! have_posts())
    <div class="section">
      <div class="container">
        <x-alert type="warning">
          {!! __('Sorry, no results were found.', 'sage') !!}
        </x-alert>

        {!! get_search_form(false) !!}
      </div>
    </div>
  @endif

  @while(have_posts())
    @php(the_post())
    <div class="section card-podcast">
      <div class="container">
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      </div>
    </div>
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
