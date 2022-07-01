<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $constructionName }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex-col" style="height: calc(100vh - 19rem); overflow-x: auto">
                    @foreach($orders as $order)
                        <div class="flex justify-between mb-2 border-b border-gray-400">
                            <div class="flex-col w-48">
                                <a href="{{ route('orders.edit', $order->id) }}" class="font-semibold">{{ $order->date }}</a>
                                <ul class="bg-gray-100 rounded py-1 px-1 ml-12" style="font-family: monospace; font-size: 0.7rem; width: 350px">
                                    @foreach($order->items as $item)
                                        <li class="w-full flex justify-between">
                                            <div style="width: 200px">{{ $item->material->name }}</div>
                                            <div style="width: 100px; text-align: end">R${{ number_format($item->price/100, 2, ',', '.') }}</div>
                                            <div style="width: 50px; text-align: end">{{ $item->quantity }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>R${{ number_format($order->total/100, 2, ',', '.') }}</div>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remover</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-between mt-1 mx-8 h-8"><b>Total</b> <span>R${{ number_format($total/100, 2, ',', '.') }}</span></div>
            <div class="flex justify-between mt-2">
                <x-button-link-cancel href="{{ route('constructions.index') }}">Voltar</x-button-link-cancel>
                <x-button-link href="{{ route('orders.create', $constructionId) }}">Novo pedido</x-button-link>
            </div>
        </div>
    </div>
</x-app-layout>
