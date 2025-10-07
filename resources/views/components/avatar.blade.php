@props(['src' => null, 'alt' => '', 'size' => 'md'])

@php
    $sizeClasses = match ($size) {
        'xs' => 'w-6 h-6',
        'sm' => 'w-8 h-8',
        'md' => 'w-10 h-10',
        'lg' => 'w-12 h-12',
        'xl' => 'w-16 h-16',
        '2xl' => 'w-20 h-20',
        '3xl' => 'w-24 h-24',
        default => 'w-10 h-10',
    };
@endphp

<div {{ $attributes->merge(['class' => "{$sizeClasses} rounded-full overflow-hidden flex-shrink-0"]) }}>
    @if ($src)
        <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full object-cover">
    @else
        <div class="w-full h-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-1/2 w-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
    @endif
</div>
