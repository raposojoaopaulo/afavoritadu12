<header class="header" id="header">
  <div class="container">
      <div class="header__column">
          <div class="header__column-item">
            <img class="h-8 w-auto" src="{{ asset('storage/' . $store->logo) }}" alt="Logo">
          </div>
          <div class="header__column-item">
              <nav class="navigation">
                  <div class="navigation__item">
                      <a href="#theStore" class="">A Loja</a>
                  </div>
                  <div class="navigation__item">
                      <a id='link-cursos' href="#gallery" class="">Galeria</a>
                  </div>
                  <div class="navigation__item">
                      <a href="#social" class="">Nossas Redes</a>
                  </div>
                  <div class="navigation__item">
                      <a href="#contact" class="">Contato</a>
                  </div>
              
                  <a href="{{ route("pages.home") }}" class="free-class__btn cta-header">
                    Selecione outra loja
                  </a>
              </nav>
              <button type="button" class="toggle-menu" id="open-menu-mobile" aria-label="abrir menu">
                  <svg class="icon-open" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="20" height="2" rx="1" fill="#fff"/>
                    <rect y="7" width="20" height="2" rx="1" fill="#fff"/>
                    <rect y="14" width="20" height="2" rx="1" fill="#fff"/>
                  </svg>
                  <svg class="icon-close" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect x="1.85779" y="0.221802" width="20" height="2" rx="1" transform="rotate(45 1.85779 0.221802)" fill="#fff"/>
                      <rect x="-0.000244141" y="14.1421" width="20" height="2" rx="1" transform="rotate(-45 -0.000244141 14.1421)" fill="#fff"/>
                  </svg>
              </button>
          </div>

      </div>
  </div>
</header>

