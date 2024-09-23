<footer class="content-info position-relative">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-4">
        @if ($footer['data']['logo'])
          <a href="{{ home_url() }}" aria-label="Accueil">
            {!! wp_get_attachment_image( $footer['data']['logo']['id'], 'full','', array( "class" => "img-fluid")) !!}
          </a>
        @endif
      </div>
      <div class="col-12 col-lg-5">
        @if($footer['data']['menu_group']['col_repeater'])
          <div class="row wp-block menu">
            @php $t = count($footer['data']['menu_group']['col_repeater']); $i = 1; dd($t) @endphp
            @foreach($footer['data']['menu_group']['col_repeater'] as $col)
              <div class="col-12 col-lg-6 {{ $i == $t ? '' : 'mb-4' }}">
                <div class="d-flex flex-column wp-menu text-center text-lg-start">
                  @if($col['title'])
                    <span class="title">{!! $col['title'] !!}</span>
                  @endif
                  @if($col['item_repeater'])
                    @foreach($col['item_repeater'] as $item)
                      @include('partials.template-parts.link', ['item' => $item['link'], 'class' => ''])
                    @endforeach
                  @endif
                </div>
              </div>
              @php $i++; @endphp
            @endforeach
          </div>
        @endif
      </div>
      <div class="col-9 col-lg-3">
        @if($footer['data']['widget_newsletter']['fom_id'])
          <div class="d-flex flex-column wp-block newsletter">
            @if($footer['data']['widget_newsletter']['title'])
              <span class="title text-center text-lg-start">{!! $footer['data']['widget_newsletter']['title'] !!}</span>
            @endif
            {!! gravity_form( $footer['data']['widget_newsletter']['fom_id'], false, false, false, '', false ) !!}
          </div>
        @endif
      </div>
    </div>
  </div>
</footer>
@include('components.mobile-menu')
<script defer src="https://player.ausha.co/ausha-player.js"></script>
<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="newsletterModalLabel">Votre recherche</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {!! get_search_form(false) !!}
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
@if($footer['data']['widget_newsletter']['fom_id'])
  <div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          @if($footer['data']['widget_newsletter']['title'])
            <h2 class="modal-title fs-5" id="newsletterModalLabel">{!! $footer['data']['widget_newsletter']['title'] !!}</h2>
          @endif
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! gravity_form( $footer['data']['widget_newsletter']['fom_id'], false, false, false, '', true ) !!}
        </div>
      </div>
    </div>
  </div>
@endif

