@props([
    'type' => 'button',
    'color' => 'primary',
    'href' => null,
    'size' => 'md',
    'disabled' => false,
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50';
    
    $sizeClasses = match ($size) {
        'xs' => 'px-2 py-1 text-xs rounded',
        'sm' => 'px-3 py-1.5 text-sm rounded-md',
        'md' => 'px-4 py-2 text-sm rounded-md',
        'lg' => 'px-5 py-2.5 text-base rounded-md',
        'xl' => 'px-6 py-3 text-base rounded-lg',
        default => 'px-4 py-2 text-sm rounded-md',
    };
    
    $colorClasses = match ($color) {
        'primary' => 'bg-teal-600 hover:bg-teal-700 text-white focus:ring-teal-500 shadow-sm',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white focus:ring-gray-500 shadow-sm',
        'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-500 shadow-sm',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500 shadow-sm',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white focus:ring-yellow-500 shadow-sm',
        'info' => 'bg-blue-500 hover:bg-blue-600 text-white focus:ring-blue-400 shadow-sm',
        'light' => 'bg-gray-100 hover:bg-gray-200 text-gray-700 focus:ring-gray-400 border border-gray-300',
        'dark' => 'bg-gray-800 hover:bg-gray-900 text-white focus:ring-gray-600 shadow-sm',
        'outline-primary' => 'border border-teal-600 text-teal-600 hover:bg-teal-50 focus:ring-teal-500',
        'outline-secondary' => 'border border-gray-600 text-gray-600 hover:bg-gray-50 focus:ring-gray-500',
        'outline-success' => 'border border-green-600 text-green-600 hover:bg-green-50 focus:ring-green-500',
        'outline-danger' => 'border border-red-600 text-red-600 hover:bg-red-50 focus:ring-red-500',
        'outline-warning' => 'border border-yellow-500 text-yellow-500 hover:bg-yellow-50 focus:ring-yellow-500',
        'outline-info' => 'border border-blue-500 text-blue-500 hover:bg-blue-50 focus:ring-blue-400',
        'outline-light' => 'border border-gray-300 text-gray-700 hover:bg-gray-50 focus:ring-gray-400',
        'outline-dark' => 'border border-gray-800 text-gray-800 hover:bg-gray-50 focus:ring-gray-600',
        'link' => 'text-teal-600 hover:text-teal-700 underline focus:ring-teal-500',
        default => 'bg-teal-600 hover:bg-teal-700 text-white focus:ring-teal-500 shadow-sm',
    };
    
    $classes = "{$baseClasses} {$sizeClasses} {$colorClasses}";
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes, 'disabled' => $disabled]) }}>
        {{ $slot }}
    </button>
@endif
