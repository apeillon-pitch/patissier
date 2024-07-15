@extends('layouts.app')

@section('content')

  <div class="section">
    <div class="container">
      <div class="row justify-content-center pt-5 pb-5">
        <div class="col-12 col-lg-6 text-center pt-5 pb-5">
          @if (! have_posts())
            <h1 class="section-title style-two mb-4">Erreur 404</h1>
            <x-alert type="warning" class="mb-4">
              {!! __('Si vous êtes perdu, vous pouvez toujours faire une recherche.', 'sage') !!}
            </x-alert>

            {!! get_search_form(false) !!}
          @endif
        </div>
      </div>
    </div>
  </div>

@endsection
