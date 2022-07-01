<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Atualizar pedido ({{ $order->date }}) para {{ $order->construction->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <ul class="w-full bg-indigo-50 rounded" style="max-width: 50%;padding: 0.6rem; margin-bottom: 1rem; font-family: monospace">
                @foreach($order->items as $item)
                    <li class="flex justify-between">
                        <div style="width: 200px">{{ $item->material->name }}</div>
                        <div style="width: 100px; text-align: end">R${{ number_format($item->price/100, 2, ',', '.') }}</div>
                        <div style="width: 50px; text-align: end">{{ $item->quantity }}</div>
                    </li>
                @endforeach
                <li class="flex justify-between mt-3 border-t border-gray-300">
                    <strong>Total</strong> R${{ number_format($order->total/100, 2, ',', '.') }}
                </li>
            </ul>
            <form action="{{ route('orders.update', $order->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex-col align-middle">
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
                            <x-label for="price">Preço (use + para somar valores)</x-label>
                            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                        </div>
                        <div>
                            <x-label for="quantity">Quantidade</x-label>
                            <x-input id="quantity" class="block mt-1 w-full" type="number" min="1" name="quantity" value="1" required />
                        </div>

                    </div>
                </div>
                <div class="flex justify-between mt-2">
                    <x-button-link-cancel href="{{ route('orders.index', $order->construction->id) }}">Voltar</x-button-link-cancel>
                    <x-button-link href="{{ route('orders.create', $order->construction->id) }}">Novo pedido</x-button-link>
                    <x-button>Salvar</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
