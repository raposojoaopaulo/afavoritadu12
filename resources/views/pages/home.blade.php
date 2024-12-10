<x-site-layout>
  <section class="home">
    <img src="{{ asset('/images/select_store/logos.webp') }}" alt="Logo das Lojas">
    <div class="selectStore">
      <h2 class="">Selecione a loja <span>da sua cidade</span></h2>
      {{-- @foreach($stores as $store)
        <a href="{{ route('store.show', $store->slug) }}" class="text-center mt-4 flex justify-center items-center">{{ $store->city_name }}</a>
      @endforeach --}}
      <form action="{{ route('store.select') }}" method="POST" class="selectStore__form">
        @csrf
        <select name="store_slug" class="selectStore__form-select">
          <option value="" disabled selected class="disabled">Selecione</option>
          @foreach($stores as $store)
            <option value="{{ $store->slug }}">{{ $store->city_name }}, Paraná</option>
          @endforeach
        </select>
        <button type="submit" class="selectStore__form-btn">Selecionar Loja</button>
      </form>
    </div>
  </section>
</x-site-layout>
