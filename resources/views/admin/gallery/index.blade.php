<x-app-layout>
  <x-slot name="header">
      <h2 class="text-2xl font-semibold leading-tight text-gray-800">
          {{ __('Gerenciar Galeria') }}
      </h2>
  </x-slot>

  <div class="container mx-auto p-4">

    <div class="form-box flex-col">
        @if(session('success'))
            <div class="success-container">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf
            <h2>Adicionar nova imagem</h2>
            <div class="flex items-center">
                <input type="file" name="image" required class="border p-2 rounded mr-4">
                <input type="text" name="description" placeholder="Nome/Descrição da imagem" class="border p-2 rounded mt-2 sm:mt-0 sm:mr-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Adicionar</button>
            </div>
            @error('image')
            <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
            @error('description')
                <div class="text-red-500 mt-2">{{ $message }}</div>
            @enderror
        </form>
    </div>
  </div>

  <div class="container">
    <div class="order-box">
        <div id="gallery-images" class="adminGallery">
            @foreach($images as $image)
                <div class="image-item order-card" data-id="{{ $image->id }}">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Imagem" class="w-32 h-32 object-cover">
                    <p>{{ $image->description }}</p>
                    <form action="{{ route('gallery.destroy', $image->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-2 rounded">Remover</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var el = document.getElementById('gallery-images');
        var sortable = Sortable.create(el, {
            animation: 150,
            handle: '.image-item',
            onEnd: function (evt) {
                var order = [];
                el.querySelectorAll('.image-item').forEach(function (item) {
                    order.push(item.getAttribute('data-id'));
                });

                fetch('{{ route('gallery.order') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ order: order }),
                });
            },
        });
    });
  </script>


</x-app-layout>
