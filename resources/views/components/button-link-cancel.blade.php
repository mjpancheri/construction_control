<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-gray-900 rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 bg-white text-black hover:bg-gray-300 active:bg-gray-500 focus:border-gray-900']) }}>
    {{ $slot }}
</a>
