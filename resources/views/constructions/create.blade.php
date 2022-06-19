<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('constructions.store') }}" method="post">
                @csrf
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex-col align-middle">
                        <div>
                            <x-label for="name">Nome</x-label>
                            <x-input type="text" name="name" id="name" class="block mt-1 w-full" />
                        </div>
                        <div>
                            <x-label for="type">Tipo</x-label>
                            <x-select name="type" id="type">
                                <option value="">Selecione uma opção</option>
                                <option value="CONSTRUCTION">Construção</option>
                                <option value="RENOVATION">Reforma</option>
                            </x-select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between mt-2">
                    <x-button-link-cancel href="/dashboard" class="rounded bg-gray-500 py-3 px-4">Voltar</x-button-link-cancel>
                    <x-button type="submit">Salvar</x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
