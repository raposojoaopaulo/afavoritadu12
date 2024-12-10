<div class="the-store" id="theStore">
  <div class="container">
    <h2 class="the-store__title">
      <span>Grande variedade</span> de produtos 
    </h2>
    <div class="the-store__products-list">
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.organizacao />
        </div>
        <div class="product-item__name">
          Organização
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.decoracao />
        </div>
        <div class="product-item__name">
          Decoração
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.presentes />
        </div>
        <div class="product-item__name">
          Presentes
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.utilidades />
        </div>
        <div class="product-item__name">
          Utilidades
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.banheiro />
        </div>
        <div class="product-item__name">
          Banheiro
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.papelaria />
        </div>
        <div class="product-item__name">
          Papelaria
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.brinquedos />
        </div>
        <div class="product-item__name">
          Brinquedos
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.comemorativos />
        </div>
        <div class="product-item__name">
          Comemorativos
        </div>
      </div>
      <div class="product-item">
        <div class="product-item__icon">
          <x-icons.uso_pessoal />
        </div>
        <div class="product-item__name">
          Uso Pessoal
        </div>
      </div>
    </div>
    <div class="gallery-container" id="gallery">
      <h3 class="gallery-container__title">Galeria</h3>
      <p>
        Confira nossa seleção de brinquedos, acessórios de camping, ferramentas, roupas infantis e adultas.
      </p>
      <div class="gallery">
        @foreach($galleryImages as $image)
          <div class="gallery__item">
            <a data-fancybox="gallery" href="{{ asset('storage/' . $image->image_path) }}" data-caption="{{ $image->description }}">
              <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->description ?? 'Produtos para a sua casa, presentes e muitas outras coisas que você pode encontrar nas Lojas A Favorita' }}" class="w-full h-auto object-cover">
            </a>
            <p class="gallery__item-description">{{ $image->description ?? 'Imagem sem descrição' }}</p>
          </div>
        @endforeach
      </div>
      <div class="gallery-container__cta">
        <h4>Se interessou em algum <span>produto?</span></h4>
        <x-buttons.whatsbutton :store="$store"/>
      </div>
    </div>    
  </div>
</div>