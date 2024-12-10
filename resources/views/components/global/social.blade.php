<div class="social" id="social">
  <div class="container">
    <h2 class="social__title">
      Siga nossas <span>redes sociais</span>
    </h2>
    @props(['instagramPosts'])
    <div class="social__insta">
      @if(!empty($instagramPosts))
        @foreach($instagramPosts as $post)
          <a href="{{ $post['permalink'] }}" target="_blank"  class="photo">
            <x-icons.insta_absolute />
            @if($post['media_type'] === 'IMAGE')
              <img src="{{ $post['media_url'] }}" alt="Instagram Image" style="width: 100%; height: auto;">
            @elseif($post['media_type'] === 'VIDEO')
              <img src="{{ $post['thumbnail_url'] }}" alt="Instagram Video" style="width: 100%; height: auto;">
            @elseif($post['media_type'] === 'CAROUSEL_ALBUM')
              <img src="{{ $post['media_url'] }}" alt="Instagram Carousel" style="width: 100%; height: auto;">
            @else
              <p>Mídia não suportada.</p>
            @endif
          </a>
        @endforeach
      @else
        <p>Nenhum post do Instagram disponível no momento.</p>
      @endif
    </div>
    <div class="social__links">
      @props(['store'])
      @if($store->instagram_url)
          <a href="{{ $store->instagram_url }}" target="_blank" class="social__links-item">
              <x-icons.instagram />
          </a>
      @endif
      @if($store->facebook_url)
          <a href="{{ $store->facebook_url }}" target="_blank" class="social__links-item">
              <x-icons.facebook />
          </a>
      @endif
      @if($store->tiktok_url)
          <a href="{{ $store->tiktok_url }}" target="_blank" class="social__links-item">
              <x-icons.tiktok />
          </a>
      @endif
      @if($store->youtube_url)
          <a href="{{ $store->youtube_url }}" target="_blank" class="social__links-item">
              <x-icons.youtube />
          </a>
      @endif
    </div>
    @props(['instagramPosts', 'testimonials'])
    <div class="social__testimonials">
      <h3 class="social__testimonials-title">Depoimentos<span>O que nossos clientes dizem</span></h3>
      <p class="social__testimonials-description">
        Atribuímos um grande valor a relacionamentos sólidos e vimos os
        benefícios que eles trazem para o nosso negócio. O feedback do cliente é
        essencial para nos ajudar a crescer ainda mais.
      </p>
      <div class="social__testimonials-itens">
        @foreach($testimonials as $testimonial)
          @if($testimonials->count())
            <div class="testimonial">
                @if($testimonial->photo)
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->person_name }}" class="testimonial__photo">
                @endif
                <img src="{{ asset('images/icons/stars.svg') }}" class="testimonial__stars" alt="Cinco estrelas">
                <h4 class="testimonial__name">{{ $testimonial->person_name }}</h4>
                <p class="testimonial__text">{{ $testimonial->testimonial }}</p>
            </div>
          @else
            <p>Nenhum depoimento disponível.</p>
          @endif
        @endforeach
      </div>
    </div>
  </div> 
</div>
