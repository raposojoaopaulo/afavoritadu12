<x-app-layout>
  <x-slot name="header">
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Editar Depoimento') }}
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
        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="form-admin">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="store_id">Loja:</label>
              <select name="store_id" id="store_id" class="form-control" required>
                  @foreach($stores as $store)
                      <option value="{{ $store->id }}">{{ $store->city_name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="person_name">Nome da Pessoa:</label>
              <input type="text" name="person_name" id="person_name" class="form-control" value="{{ old('person_name', $testimonial->person_name) }}" required>
            </div>
            <div class="form-group">
              <label for="testimonial">Depoimento:</label>
              <textarea name="testimonial" id="testimonial" class="form-control" required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
            </div>
            <div class="form-group">
              <label for="photo">Foto:</label>
              <input type="file" name="photo" id="photo" class="form-control-file">
            </div>
            <button type="submit" class="btn-att">Salvar</button>
        </form>
      </div>
    </div>


    



</x-app-layout>
