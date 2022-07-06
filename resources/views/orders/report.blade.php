<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $constructionName }} - Gastos por material
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex-col" style="height: calc(100vh - 19rem); overflow-x: auto">
                    @foreach($report as $item)
                        <div class="flex justify-between mb-2 border-b border-gray-400">
                            <span><strong>{{ $item['name'] }}</strong> ({{ $item['quantity'] }})</span>
                            <span>R${{ number_format($item['price']/100, 2, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-between mt-2">
                <x-button-link-cancel href="{{ route('constructions.index') }}">Voltar</x-button-link-cancel>
            </div>
        </div>
    </div>
</x-app-layout>
