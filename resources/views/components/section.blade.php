@props(['title' => null])

<div {{ $attributes->merge(['class' => 'py-6']) }}>
    @if($title)
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">{{ $title }}</h2>
    @endif
    
    <div>
        {{ $slot }}
    </div>
</div>
