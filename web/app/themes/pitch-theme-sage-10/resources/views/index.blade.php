@extends('layouts.app')

@section('content')

  @if(is_post_type_archive('podcast'))
    @php $data = get_field('archive_podcast', 'options'); @endphp
  @elseif(is_post_type_archive('recipe'))
    @php $data = get_field('archive_recipe', 'options'); @endphp
  @elseif(is_tax('magazine'))
    @php $data = get_field('archive_magazine', 'options'); @endphp
  @else
    @php $data = get_field('archive_magazine', 'options'); @endphp
  @endif

  <div class="wp-heading">
    <div class="container">
      <div class="d-flex flex-row justify-content-between">
        <h1 class="section-title">{!! $data['title'] !!}</h1>
        @if(is_post_type_archive('recipe'))
          <div class="d-flex flex-row justify-content-end">
            @php $terms = get_terms('magazine') @endphp
            <select id="mag-filter">
              <option value="" disabled selected>Tous les numéros</option>
              @foreach($terms as $term)
                <option value="{{ get_term_link($term) }}">Numéro #{!! $term->name !!}</option>
              @endforeach
            </select>
            @if($data['button'])
              <a href="{{ $data['button']['url'] }}" target="{{ $data['button']['target'] }}"
                 class="btn btn-secondary ms-4"
                 aria-label="{!! $data['button']['title'] !!}">
                {!! $data['button']['title'] !!}
              </a>
            @endif
          </div>
        @elseif(is_post_type_archive('podcast'))
          @if($data['button'])
            <a href="{{ $data['button']['url'] }}" target="{{ $data['button']['target'] }}" class="btn btn-secondary"
               aria-label="{!! $data['button']['title'] !!}">
              {!! $data['button']['title'] !!}
            </a>
          @endif
        @elseif(is_tax('magazine'))
          @php $terms = get_terms('magazine') @endphp
          <select id="mag-filter">
            <option value="" disabled>Tous les numéros</option>
            @foreach($terms as $term)
              <option
                value="{{ get_term_link($term) }}" {{ $term->name === get_the_archive_title() ? 'selected' : '' }}>
                Numéro #{!! $term->name !!}</option>
            @endforeach
          </select>
        @endif
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

  @if(is_post_type_archive('podcast'))
    @while(have_posts())
      @php the_post() @endphp
      <div class="section card-podcast">
        <div class="container">
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        </div>
      </div>
    @endwhile
  @elseif(is_post_type_archive('recipe') or is_tax('magazine'))
    <div class="section">
      <div class="container">
        @php
          $posts = [];
          while (have_posts()) {
            the_post();
            $posts[] = get_post();
          }
          $total_posts = count($posts);
        @endphp
        <div class="row wp-list">
          <div class="col-12 col-lg-5">
            @php
              $post = $posts[0];
              setup_postdata($post);
              $title = get_the_title($post->ID);
              $permalink = get_the_permalink($post->ID);
            @endphp
            <div class="col-12 h-100 mb-4">
              <a href="{{ $permalink }}" aria-label="{!! $title !!}" class="card-recipe style-two main h-100">
                @includeFirst(['partials.content-' . get_post_type(), 'partials.content'], ['id' => $post->ID])
              </a>
            </div>
          </div>
          <div class="col-12 col-lg-7">
            <div class="row">
              @php
                $right_side_posts = array_slice($posts, 1, 6);
                $title = get_the_title($post->ID);
                $permalink = get_the_permalink($post->ID);
              @endphp

              @foreach ($right_side_posts as $post)
                @php setup_postdata($post); @endphp
                <div class="col-4 mb-4">
                  <a href="{{ $permalink }}" aria-label="{!! $title !!}" class="card-recipe style-two">
                    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'], ['id' => $post->ID])
                  </a>
                </div>
              @endforeach
              @php wp_reset_postdata(); @endphp
            </div>
          </div>
        </div>
        <div class="grid">
          @php
            $right_side_posts = array_slice($posts, 6, -1);
            $title = get_the_title($post->ID);
            $permalink = get_the_permalink($post->ID);
          @endphp
          @foreach ($right_side_posts as $post)
            @php setup_postdata($post); @endphp
            <a href="{{ $permalink }}" aria-label="{!! $title !!}" class="card-recipe style-two">
              @includeFirst(['partials.content-' . get_post_type(), 'partials.content'], ['id' => $post->ID])
            </a>
          @endforeach
          @php wp_reset_postdata(); @endphp
        </div>
      </div>
    </div>
  @endif

  {!! get_the_posts_navigation() !!}
@endsection
