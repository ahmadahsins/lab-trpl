<x-app-layout>
    <!-- Header Section -->
    <div class="bg-teal-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    Dosen Teknologi Rekayasa Perangkat Lunak
                </h1>
                <p class="text-xl text-teal-100 max-w-2xl mx-auto">
                    Tim pengajar dan peneliti yang berpengalaman di bidang teknologi perangkat lunak
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
            <h2 class="text-xl font-semibold text-gray-900 mb-6">Filter Dosen</h2>
            <form action="{{ route('dosen.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="w-full rounded-lg border-gray-300 focus:border-teal-500 focus:ring-teal-500">
                        <option value="">Semua Jabatan</option>
                        <option value="Profesor">Profesor</option>
                        <option value="Lektor Kepala">Lektor Kepala</option>
                        <option value="Lektor">Lektor</option>
                        <option value="Asisten Ahli">Asisten Ahli</option>
                    </select>
                </div>
                <div>
                    <label for="bidang_keahlian" class="block text-sm font-medium text-gray-700 mb-2">Bidang Keahlian</label>
                    <select name="bidang_keahlian" id="bidang_keahlian" class="w-full rounded-lg border-gray-300 focus:border-teal-500 focus:ring-teal-500">
                        <option value="">Semua Bidang</option>
                        @foreach($bidangKeahlians as $bidang)
                        <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2.5 px-6 rounded-lg transition-colors duration-200">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Dosen Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($dosens as $dosen)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        @if($dosen->foto)
                        <img src="{{ asset('storage/' . $dosen->foto) }}" alt="{{ $dosen->nama }}" class="w-16 h-16 rounded-full object-cover mr-4">
                        @else
                        <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mr-4">
                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        @endif
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $dosen->nama }}</h3>
                            <p class="text-gray-600 text-sm">{{ $dosen->jabatan }}</p>
                        </div>
                    </div>
                    
                    @if($dosen->bidangKeahlians->count() > 0)
                    <div class="mb-4">
                        <h4 class="text-sm font-medium text-gray-700 mb-2">Bidang Keahlian:</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($dosen->bidangKeahlians as $bidang)
                            <span class="bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-full">{{ $bidang->nama_bidang }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <div class="flex justify-between items-center mt-4">
                        <div class="flex space-x-4 text-sm text-gray-500">
                            <span class="flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                {{ $dosen->proyeks_count }} Proyek
                            </span>
                            <span class="flex items-center">
                                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                {{ $dosen->mahasiswaProyeks_count }} Mahasiswa
                            </span>
                        </div>
                        <a href="{{ route('dosen.show', ['dosen' => $dosen]) }}" class="text-teal-600 hover:text-teal-700 font-semibold text-sm">
                            Lihat Detail →
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 bg-white rounded-xl shadow-sm border border-gray-200 p-8 text-center">
                <svg class="w-12 h-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <p class="text-gray-600">Tidak ada dosen yang ditemukan dengan filter yang dipilih.</p>
            </div>
            @endforelse
        </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $dosens->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
