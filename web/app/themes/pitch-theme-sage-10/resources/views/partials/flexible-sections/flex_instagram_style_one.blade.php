@php $options = getSectionOptions($section['section_options_group']); @endphp
<div id="section-{{ $row }}" class="section instagram style-one {{ $options['oclasses'] }} bg-grey">
  <div class="inner-section">
    <div class="{{ (is_singular('recipe') or is_singular('post')) ? '' : 'container' }}">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="d-flex flex-column wp-content">
            <div class="d-flex flex-column wp-heading">
              @if ($section['title_group']['title'])
                @include('partials.template-parts.title', ['item' => $section['title_group'], 'class' => 'section-title style-two'])
              @endif
              <a href="https://www.instagram.com/lejournaldupatissier/" aria-label="Follow on Instagram" target="_blank" class="d-flex flex-row align-items-center">
                <i class="fa-brands fa-instagram me-2"></i>
                <span>Follow on Instagram</span>
              </a>
            </div>
            @if($section['id'])
             @php echo do_shortcode('[instagram-feed feed=' . $section['id'] . ']') @endphp
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
