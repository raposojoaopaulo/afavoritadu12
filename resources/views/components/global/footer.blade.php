@php
  $whatsappNumber = preg_replace('/\D+/', '', $store->whatsapp);

  if (substr($whatsappNumber, 0, 2) !== '55') {
    $whatsappNumber = '55' . $whatsappNumber;
  }
@endphp

<footer class="footer">
  <img src="{{ asset('images/landing/footer/logo_footer.webp') }}" alt="Logo">
  <div class="container">
    <div class="links">
      <a href="">A Loja</a>
      <a href="">Galeria</a>
      <a href="">Nossas Redes</a>
      <a href="">Contato</a>
    </div>
    <div class="contactWhats">
        <div class="contactWhats__title">Fale conosco <span>no WhatsApp</span></div>
        <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Olá, eu vim pelo site e gostaria de mais informações') }}" target="_blank" class="contactWhats__button">
          <x-icons.whatsapp-cta />
          <div class="number">
            {{ $store->whatsapp }}
          </div>
        </a>

    </div>
    <div class="infos">
      <p>
        {{ $store->address }}
      </p>
      <p>
        {{ $store->city_name }}
      </p>
      <div class="infos__links">
        @props(['store'])
        @if($store->instagram_url)
            <a href="{{ $store->instagram_url }}" target="_blank" class="social__links-item">
              <img src="{{ asset('images/landing/footer/insta_footer.svg') }}" alt="Icone do Instagram">
            </a>
        @endif
        @if($store->facebook_url)
            <a href="{{ $store->facebook_url }}" target="_blank" class="social__links-item">
              <img src="{{ asset('images/landing/footer/facebook_footer.svg') }}" alt="Icone do Facebook">
            </a>
        @endif
        @if($store->tiktok_url)
            <a href="{{ $store->tiktok_url }}" target="_blank" class="social__links-item">
              <img src="{{ asset('images/landing/footer/tiktok_footer.svg') }}" alt="Icone do Tiktok">
            </a>
        @endif
        @if($store->youtube_url)
            <a href="{{ $store->youtube_url }}" target="_blank" class="social__links-item">
              <img src="{{ asset('images/landing/footer/youtube_footer.svg') }}" alt="Icone do Youtube">
            </a>
        @endif
      </div>
    </div>
  </div>
</footer>