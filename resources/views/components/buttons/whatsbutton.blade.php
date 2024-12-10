@php
  $whatsappNumber = preg_replace('/\D+/', '', $store->whatsapp);

  if (substr($whatsappNumber, 0, 2) !== '55') {
    $whatsappNumber = '55' . $whatsappNumber;
  }
@endphp

<a href="https://wa.me/{{ $whatsappNumber }}?text={{ urlencode('Olá, eu vim pelo site e gostaria de mais informações') }}" target="_blank" class="whats-cta">
  <x-icons.whatsapp-cta />
  <div class="whats-cta__text">
    Fale com um vendedor pelo <span>WhatsApp</span>
  </div>
</a>