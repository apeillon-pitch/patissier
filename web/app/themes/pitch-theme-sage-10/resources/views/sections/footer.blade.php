<footer class="content-info position-relative">
  <div class="container">
    <div class="row">
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
            @foreach($footer['data']['menu_group']['col_repeater'] as $col)
              <div class="col-12 col-lg-6">
                <div class="d-flex flex-column wp-menu">
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
            @endforeach
          </div>
        @endif
      </div>
      <div class="col-12 col-lg-3">
        @if($footer['data']['widget_newsletter']['fom_id'])
          <div class="d-flex flex-column wp-block newsletter">
            @if($footer['data']['widget_newsletter']['title'])
              <span class="title">{!! $footer['data']['widget_newsletter']['title'] !!}</span>
            @endif
            {!! gravity_form( $footer['data']['widget_newsletter']['fom_id'], false, false, false, '', false ) !!}
          </div>
        @endif
      </div>
    </div>
  </div>
</footer>
@include('components.mobile-menu')
<script src=“https://player.ausha.co/ausha-player.js”></script>
<!-- Modal -->
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="newsletterModalLabel">Newsletter</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="accountModalLabel">Connexion</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
