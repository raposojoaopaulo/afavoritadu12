<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar loja') }}
        </h1>
    </x-slot>
  
    <div class="container">
      <div class="form-box">
          @if($errors->any())
              <div>
                  <ul>
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{ route('admin.stores.update', $store->id) }}" method="POST" enctype="multipart/form-data" class="form-admin">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="city_name">Nome da Cidade:</label>
                    <input type="text" name="city_name" id="city_name" value="{{ $store->city_name }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" name="slug" id="slug" value="{{ $store->slug }}" required>
                </div>
                <div class="group">
                    <div class="form-group">
                        <label for="phone">Telefone:</label>
                        <input type="text" name="phone" id="phone" value="{{ $store->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="whatsapp">WhatsApp:</label>
                        <input type="text" name="whatsapp" id="whatsapp" value="{{ $store->whatsapp }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Endereço:</label>
                    <input type="text" name="address" id="address" value="{{ $store->address }}" required>
                </div>
                <div class="social">
                    <div class="group">
                        <div class="form-group">
                            <label for="facebook_url">Facebook:</label>
                            <input type="text" name="facebook_url" id="facebook_url" value="{{ $store->facebook_url }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram_url">Instagram:</label>
                            <input type="text" name="instagram_url" id="instagram_url" value="{{ $store->instagram_url }}">
                        </div>
                    </div>
                    <div class="group">
                        <div class="form-group">
                            <label for="tiktok_url">Tiktok:</label>
                            <input type="text" name="tiktok_url" id="tiktok_url" value="{{ $store->tiktok_url }}" >
                        </div>
                        <div class="form-group">
                            <label for="youtube_url">Youtube:</label>
                            <input type="text" name="youtube_url" id="youtube_url" value="{{ $store->youtube_url }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instagram_token">Token da API do Instagram:</label>
                        <input type="text" name="instagram_token" id="instagram_token" value="{{ $store->instagram_token }}" required>
                    </div>
                </div>

                <div class="social">
                    <div class="group">
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <input type="text" name="latitude" id="latitude" value="{{ $store->latitude }}" >
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <input type="text" name="longitude" id="longitude" value="{{ $store->longitude }}">
                        </div>
                    </div>
                </div>
        
                @if ($store->logo)
                    <div class="form-group">
                        <img src="{{ asset('storage/' . $store->logo) }}" alt="Logo da loja" width="100">
                        <p>Logo atual</p>
                    </div>
                @endif

              <button type="submit" class="btn-att">Atualizar Loja</button>
          </form>
        </div>
    </div>      
</x-app-layout>
  