<x-app-layout>
    <!-- Header Section -->
    <div class="bg-teal-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Laboratorium
                </h1>
                <p class="text-xl text-teal-100 max-w-2xl mx-auto">
                    Fasilitas laboratorium yang tersedia untuk mendukung pembelajaran dan penelitian
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Lab Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($labs as $lab)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                @if($lab->foto)
                <img src="{{ asset('storage/' . $lab->foto) }}" alt="{{ $lab->nama_lab }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                    <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $lab->nama_lab }}</h3>
                    <p class="text-gray-600 mb-4">{{ $lab->lokasi }}</p>
                    
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4 text-sm text-gray-500">
                            <span class="flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                {{ $lab->proyeks_count }} Proyek
                            </span>
                            <span class="flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                {{ $lab->laborans_count }} Laboran
                            </span>
                        </div>
                        <a href="{{ route('lab.show', ['slug' => $lab->slug]) }}" class="text-teal-600 hover:text-teal-700 font-semibold text-sm">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <p class="text-gray-600">Tidak ada laboratorium yang ditemukan.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $labs->links() }}
        </div>
    </div>
</x-app-layout>
