<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Construções e reformas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                    <ul class="w-full">
                        @foreach($constructions as $construction)
                            <li class="flex justify-between">
                                <a href="{{ route('orders.index', $construction->id) }}">
                                    {{ Str::ucfirst($construction->name) }} ({{ $construction->type == 'RENOVATION' ? 'reforma' : 'construção' }}) - {{ $construction->created_at->format('d/m/Y H:i') }}
                                </a>
                                <form action="{{ route('constructions.destroy', $construction->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remover</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex justify-between mt-2">
                <x-button-link-cancel href="/dashboard">Voltar</x-button-link-cancel>
                <x-button-link href="{{ route('constructions.create') }}">Nova construção/reforma</x-button-link>
            </div>
        </div>
    </div>
</x-app-layout>
