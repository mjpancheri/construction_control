<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Novo pedido para {{ $constructionName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('orders.store') }}" method="post">
                <input type="hidden" name="construction_id" value="{{ $constructionId }}">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex-col align-middle">
                        <div>
                            <x-label for="date">Data</x-label>
                            <x-input id="date" class="block mt-1" type="date" name="date" :value="old('date')" required />
                        </div>
                        <div>
                            <x-label for="material" :value="'Material'" />
                            <x-select name="material" id="material" required>
                                <option value="">Selecione um material</option>
                                @foreach($materials as $material)
                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div>
                            <x-label for="price" :value="'Preço'" />
                            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                        </div>
                        <div>
                            <x-label for="quantity">Quantidade</x-label>
                            <x-input id="quantity" class="block mt-1 w-full" type="number" min="1" name="quantity" value="1" required />
                        </div>

                    </div>
                </div>
                <div class="flex justify-between mt-2">
                    <x-button-link-cancel href="{{ route('orders.index', $constructionId) }}">Voltar</x-button-link-cancel>
                    <x-button>Salvar</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
