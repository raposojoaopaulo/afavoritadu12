<x-app-layout>
  <x-slot name="header">
      <h2 class="text-2xl font-semibold leading-tight text-gray-800">
          {{ __('Listagem de lojas') }}
      </h2>
  </x-slot>

  <div class="container flex mx-auto max-w-[80rem] p-4 lg:px-[2rem]">
    <div class="form-box flex flex-col w-full bg-white shadow-md rounded-lg p-6 my-[3rem] lg:p-12">
      <a href="{{ route('admin.stores.create') }}" class="inline-block mb-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 max-w-[200px]">Adicionar Nova Loja</a>

      <div class="overflow-auto">
        <table class="min-w-full bg-white rounded table-auto">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600">ID</th>
                    <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600">Cidade</th>
                    <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600">Telefone</th>
                    <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600">WhatsApp</th>
                    <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600">Endereço</th>
                    <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600">Logo</th>
                    <th class="py-4 px-6 bg-gray-200 font-bold uppercase text-sm text-gray-600">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($stores as $store)
                <tr class="bg-white even:bg-gray-50 hover:bg-gray-100">
                    <td class="py-4 px-6">{{ $store->id }}</td>
                    <td class="py-4 px-6">{{ $store->city_name }}</td>
                    <td class="py-4 px-6 whitespace-nowrap min-w-[120px]">{{ $store->phone }}</td>
                    <td class="py-4 px-6 whitespace-nowrap min-w-[120px]">{{ $store->whatsapp }}</td>
                    <td class="py-4 px-6 min-w-[120px]">{{ $store->address }}</td>
                    <td class="py-4 px-6">
                      <img src="{{ asset('storage/' . $store->logo) }}" alt="{{ $store->city_name }}" class="w-10 h-10 object-contain">
                    </td>
                    <td class="py-4 px-6">
                      <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.stores.edit', $store->id) }}" class="btn-edit">Editar</a>
                        <form action="{{ route('admin.stores.destroy', $store->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja remover esta loja?');">
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
