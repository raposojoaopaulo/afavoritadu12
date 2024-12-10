<x-app-layout>
  <x-slot name="header">
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Depoimentos') }}
      </h1>
  </x-slot>

  <div class="container flex mx-auto max-w-[80rem] p-4 lg:px-[2rem]">
    <div class="form-box flex flex-col w-full bg-white shadow-md rounded-lg p-6 my-[3rem] lg:p-12">
      <a href="{{ route('admin.testimonials.create') }}" class="inline-block mb-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 max-w-[200px]">Adicionar Depoimento</a>

      <div class="overflow-auto">
        <table class="min-w-full bg-white rounded table-auto">
            <thead>
              <tr>
                <th>ID</th>
                <th>Loja</th>
                <th>Nome</th>
                <th>Depoimento</th>
                <th>Foto</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach($testimonials as $testimonial)
                <tr class="bg-white even:bg-gray-50 hover:bg-gray-100">
                    <td class="py-4 px-6">{{ $testimonial->id }}</td>
                    <td class="py-4 px-6">{{ $testimonial->store->city_name }}</td>
                    <td class="py-4 px-6 whitespace-nowrap min-w-[120px]">{{ $testimonial->person_name }}</td>
                    <td class="py-4 px-6 max-w-[450px] truncate">{{ $testimonial->testimonial }}</td>
                    <td class="py-4 px-6">
                      @if($testimonial->photo)
                        <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="Foto" width="50" class="w-10 h-10 object-contain">
                      @endif
                    </td>
                    <td class="py-4 px-6">
                      <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn-edit">Editar</a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover este depoimento?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Remover</button>
                        </form>
                      </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>  

</x-app-layout>



