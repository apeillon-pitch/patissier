@php
  $title = get_the_title();
  $type = get_field('type');
  $excerpt = get_field('excerpt');
  $thumbnail = get_field('thumbnail');
  $price = get_field('price');
  $phone = get_field('phone_number');
  $hours = get_field('hours');
  $localisation = get_field('localisation');
  $email = get_field('email');
  $website = get_field('website');
@endphp
<div class="row justify-content-center">
  <div class="col-12 col-lg-4 col-xxl-3 mb-4 mb-lg-0">
    <figure class="cover mb-0">
      @if($thumbnail)
        {!! wp_get_attachment_image($thumbnail['id'], 'large', '', array("class" => "img-fluid w-100")) !!}
      @else
        <img src="@asset('../../images/thumb-annonce.jpg')" alt="Image de l'annonce" width="307px" height="241.6px" class="img-fluid">
      @endif
    </figure>
  </div>
  <div class="col-12 col-lg-8 col-xxl-9">
    <div class="d-flex flex-column wp-content">
      @if($type)
        <strong class="category mb-1">{!! $type->name !!}</strong>
      @endif
      @if($title)
        <h2 class="title mb-4">{!! $title !!}</h2>
      @endif
      @if($excerpt)
        <p>{!! $excerpt !!}</p>
      @endif

      <div class="d-flex flex-column wp-details">
        @if($price)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/euro.svg')" alt="" width="20px" height="20px" class="me-2">
            <span>{!! $price !!}</span>
          </div>
        @endif
        @if($hours)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/hours.svg')" alt="" width="20px" height="20px" class="me-2">
            <span>{!! $hours !!}</span>
          </div>
        @endif
        @if($localisation)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/localisation.svg')" alt="" width="20px" height="20px" class="me-2">
            <span>{!! $localisation !!}</span>
          </div>
        @endif
        @if($email)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/email.svg')" alt="" width="20px" height="20px" class="me-2">
            <span>{!! $email !!}</span>
          </div>
        @endif
        @if($website)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/email.svg')" alt="" width="20px" height="20px" class="me-2">
            <span>{!! $website !!}</span>
          </div>
        @endif
        @if($phone)
          <div class="d-flex flex-row align-items-center">
            <img src="@asset('../../images/phone.svg')" alt="" width="20px" height="20px" class="me-2">
            <span>{!! $phone !!}</span>
          </div>
        @endif
      </div>

    </div>
  </div>
</div>
