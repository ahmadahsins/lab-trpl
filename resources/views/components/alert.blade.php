@props(['type' => 'info', 'message'])

@php
    $classes = match ($type) {
        'success' => 'bg-green-100 border-green-400 text-green-700 dark:bg-green-800/30 dark:border-green-700 dark:text-green-300',
        'error' => 'bg-red-100 border-red-400 text-red-700 dark:bg-red-800/30 dark:border-red-700 dark:text-red-300',
        'warning' => 'bg-yellow-100 border-yellow-400 text-yellow-700 dark:bg-yellow-800/30 dark:border-yellow-700 dark:text-yellow-300',
        default => 'bg-blue-100 border-blue-400 text-blue-700 dark:bg-blue-800/30 dark:border-blue-700 dark:text-blue-300',
    };
@endphp

<div {{ $attributes->merge(['class' => "border-l-4 p-4 mb-4 rounded-r {$classes}"]) }} role="alert">
    <p class="font-medium">{{ $message }}</p>
    @if ($slot->isNotEmpty())
        <div class="mt-2">{{ $slot }}</div>
    @endif
</div>
