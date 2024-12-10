@php
  $whatsappNumber = preg_replace('/\D+/', '', $store->whatsapp);

  if (substr($whatsappNumber, 0, 2) !== '55') {
    $whatsappNumber = '55' . $whatsappNumber;
  }
@endphp

<div class="slider">
  <swiper-container class="mySwiper" data-swiper-autoplay="2000" navigation="true" pagination="true" autoplay>
    <swiper-slide>
      <picture>
        <source media="(max-width: 768px)" srcset="{{ asset('/images/landing/banners/banner1-mob.webp') }}">
        <img src="{{ asset('/images/landing/banners/banner1.webp') }}" alt="" class="w-full h-auto">
      </picture>
      {{-- <img src="{{ asset('/images/landing/banners/banner1.webp') }}" alt="" class="w-full h-auto"> --}}
      <div class="sliderContianer">
        <h1 class="slider__title">
          As melhores alternativas para presente para a família, <span>você encontra aqui!</span>
        </h1>
        <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Olá, eu vim pelo site e gostaria de mais informações') }}" target="_blank" class="slider__cta">
          <x-icons.whatsapp-cta />
          <div class="slider__cta-text">
            Fale com um vendedor pelo <span>WhatsApp</span>
          </div>
        </a>
      </div>
    </swiper-slide>
  </swiper-container>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

</div>