@props(['title' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm border border-gray-200 rounded-xl']) }}>
    @if ($title)
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg leading-6 font-semibold text-gray-900">
                {{ $title }}
            </h3>
        </div>
    @endif
    
    <div class="px-6 py-6">
        {{ $slot }}
    </div>
    
    @if ($footer)
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            {{ $footer }}
        </div>
    @endif
</div>
