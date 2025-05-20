@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full pl-3 pr-4 py-2 border-l-4 border-blue-400 text-left text-base font-medium text-blue-300 bg-blue-800 focus:outline-none focus:text-blue-200 focus:bg-blue-900 focus:border-blue-300 transition duration-150 ease-in-out'
            : 'block w-full pl-3 pr-4 py-2 border-l-4 border-transparent text-left text-base font-medium text-gray-300 hover:text-white hover:bg-blue-800 hover:border-gray-300 focus:outline-none focus:text-gray-200 focus:bg-blue-900 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a> 