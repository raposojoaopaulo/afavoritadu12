@php
  $whatsappNumber = preg_replace('/\D+/', '', $store->whatsapp);

  if (substr($whatsappNumber, 0, 2) !== '55') {
    $whatsappNumber = '55' . $whatsappNumber;
  }
@endphp

<div class="contact" id="contact">
  <div class="container">
    <h2 class="contact__title">
      Como nos encontrar
    </h2>
    <div class="contact__infos">
      <div class="contact__infos-group">
        <div class="address-infos">
          <div class="address">{{ $store->address }}</div>
          <div class="city">{{ $store->city_name }} / PR</div>
          <div class="phone">{{ $store->phone }}</div>
        </div>
        <div id="map" class="map"></div>
      </div>
      <div class="partition"></div>
      <div class="contact__infos-group">
        <div class="ctaWhats">
          <div class="ctaWhats__title">Fale conosco <span>no WhatsApp</span></div>
          <a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Olá, eu vim pelo site e gostaria de mais informações') }}" target="_blank" class="ctaWhats__button">
            <x-icons.whatsapp-cta />
            <div class="number">
              {{ $store->whatsapp }}
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="contact__messages">
      <h2 class="contact__title">Envie uma mensagem</h2>
      <x-forms.contact-form :store="$store"/>
    </div>    
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const latitude = {{ $store->latitude ?? 0 }};
      const longitude = {{ $store->longitude ?? 0 }};

      if (!latitude || !longitude) {
          console.error("Coordenadas não definidas para esta loja.");
          return;
      }

      const map = L.map('map').setView([latitude, longitude], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([latitude, longitude]).addTo(map)
          .bindPopup('<b>{{ $store->city_name }}</b><br>{{ $store->address }}')
          .openPopup();
  });
</script>
