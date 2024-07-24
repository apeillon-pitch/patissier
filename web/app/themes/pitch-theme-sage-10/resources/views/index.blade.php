@extends('layouts.app')

@section('content')

  @if(is_post_type_archive('podcast'))
    @php $data = get_field('archive_podcast', 'options'); @endphp
  @elseif(is_post_type_archive('recipe'))
    @php $data = get_field('archive_recipe', 'options'); @endphp
  @elseif(is_post_type_archive('announcement'))
    @php $data = get_field('archive_announcement', 'options'); @endphp
  @elseif(is_tax('taxo-magazine'))
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
            @if($data['button'])
              <a href="{{ $data['button']['url'] }}" target="{{ $data['button']['target'] }}"
                 class="btn btn-secondary ms-4"
                 aria-label="{!! $data['button']['title'] !!}">
                {!! $data['button']['title'] !!}
              </a>
            @endif
          </div>
        @elseif(is_post_type_archive('podcast') or is_post_type_archive('announcement'))
          @if($data['button'])
            <a href="{{ $data['button']['url'] }}" target="{{ $data['button']['target'] }}" class="btn btn-secondary"
               aria-label="{!! $data['button']['title'] !!}">
              {!! $data['button']['title'] !!}
            </a>
          @endif
        @elseif(is_tax('taxo-magazine'))
          @php $terms = get_terms('taxo-magazine') @endphp
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
  @elseif(is_post_type_archive('announcement'))
    <div class="section">
      <div class="container">
        @php $i = 0 @endphp
        @while(have_posts())
          @php the_post() @endphp
          <div class="card-announcement {{ $i == 0 ? 'pt-0' : '' }}">
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          </div>
          @php $i++ @endphp
        @endwhile
      </div>
    </div>
  @elseif(is_post_type_archive('recipe') or is_tax('taxo-magazine'))
    <div class="section">
      <div class="container">
        @php
          $posts = [];
          while (have_posts()) {
            the_post();
            if(get_post_type() != 'magazine') {
                $posts[] = get_post();
            }
          }
          $total_posts = count($posts);
        @endphp
        <div class="row wp-list">
          <div class="col-12 col-lg-6">
            @php
              $post = $posts[0];
              $title = get_the_title($post->ID);
              $permalink = get_the_permalink($post->ID);
            @endphp
            <div class="col-12 mb-4">
              <a href="{{ $permalink }}" aria-label="{!! $title !!}" class="card-recipe style-two main h-100">
                @includeFirst(['partials.content-recipe'], ['id' => $post->ID])
              </a>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="row">
              @php
                $right_side_posts = array_slice($posts, 1, 4);
                $title = get_the_title($post->ID);
                $permalink = get_the_permalink($post->ID);
              @endphp
              @foreach ($right_side_posts as $post)
                <div class="col-12 col-lg-6 mb-4">
                  <a href="{{ $permalink }}" aria-label="{!! $title !!}" class="card-recipe style-two">
                    @includeFirst(['partials.content-recipe'], ['id' => $post->ID])
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="grid">
          @php
            $right_side_posts = array_slice($posts, 4, -1);
            $title = get_the_title($post->ID);
            $permalink = get_the_permalink($post->ID);
          @endphp
          @foreach ($right_side_posts as $post)
            <a href="{{ $permalink }}" aria-label="{!! $title !!}" class="card-recipe style-two">
              @includeFirst(['partials.content-recipe'], ['id' => $post->ID])
            </a>
          @endforeach
        </div>
      </div>
    </div>
  @endif

  <div class="container">
    <div class="d-flex flex-row justify-content-center mb-5">
      {!! get_the_posts_pagination() !!}
    </div>
  </div>
@endsection
