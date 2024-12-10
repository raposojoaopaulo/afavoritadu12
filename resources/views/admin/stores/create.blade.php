<x-app-layout>
  <x-slot name="header">
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Adicionar Nova Loja') }}
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
        <form action="{{ route('admin.stores.store') }}" method="POST" enctype="multipart/form-data" class="form-admin">
            @csrf
            <div class="form-group">
                <label for="city_name">Nome da Cidade:</label>
                <input type="text" name="city_name" id="city_name" value="{{ old('city_name') }}" required>
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required>
            </div>
            <div class="group">
                <div class="form-group">
                    <label for="phone">Telefone:</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="whatsapp">WhatsApp:</label>
                    <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Endereço completo:</label>
                <input type="text" name="address" id="address" value="{{ old('address') }}" required>
            </div>
            <div class="social">
                <div class="group">
                    <div class="form-group">
                        <label for="facebook_url">Facebook:</label>
                        <input type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url') }}" >
                    </div>
                    <div class="form-group">
                        <label for="instagram_url">Instagram:</label>
                        <input type="text" name="instagram_url" id="instagram_url" value="{{ old('instagram_url') }}" required>
                    </div>
                </div>
                <div class="group">
                    <div class="form-group">
                        <label for="tiktok_url">Tiktok:</label>
                        <input type="text" name="tiktok_url" id="tiktok_url" value="{{ old('tiktok_url') }}" >
                    </div>
                    <div class="form-group">
                        <label for="youtube_url">Youtube:</label>
                        <input type="text" name="youtube_url" id="youtube_url" value="{{ old('youtube_url') }}" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="instagram_token">Token da API do Instagram:</label>
                    <input type="text" name="instagram_token" id="instagram_token" value="{{ old('instagram_token') }}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" name="logo" id="logo">
            </div>
            <button type="submit" class="btn-create">Salvar</button>
        </form>
      </div>
    </div>


    



</x-app-layout>
