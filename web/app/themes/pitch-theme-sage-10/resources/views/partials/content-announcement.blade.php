@php
  $title = get_the_title();
  $excerpt = get_field('excerpt');
  $thumbnail = get_field('thumbnail');
  $price = get_field('price');
  $phone = get_field('phone_number');
  $localisation = get_field('localisation');
  $email = get_field('email');
  $website = get_field('website');
@endphp
<div class="row justify-content-center">
  <div class="col-12 col-lg-4 col-xxl-3">
    <figure class="cover mb-0" style="height: 240px">
      @if($thumbnail)
        {!! wp_get_attachment_image($thumbnail['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
      @else
        <img src="@asset('../../images/thumb-annonce.jpg')" alt="">
      @endif
    </figure>
  </div>
  <div class="col-12 col-lg-8 col-xxl-9">
    <div class="d-flex flex-column wp-content">

      @if($title)
        <h2 class="title mb-4">{!! $title !!}</h2>
      @endif
      @if($excerpt)
        <p>{!! $excerpt !!}</p>
      @endif

      <div class="d-flex flex-column">
        @if($price)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/euro.svg')" alt="" width="20px" height="20px">
            <span>{!! $price !!}</span>
          </div>
        @endif
        @if($phone)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/phone.svg')" alt="" width="20px" height="20px">
            <span>{!! $phone !!}</span>
          </div>
        @endif
      </div>

    </div>
  </div>
</div>
