<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-teal-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Laboratorium Teknik Rekayasa Perangkat Lunak
                </h1>
                <p class="text-xl text-teal-100 mb-8 max-w-3xl mx-auto">
                    Pusat riset dan pengembangan teknologi perangkat lunak untuk masa depan yang lebih baik
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#labs" class="bg-white text-teal-600 hover:bg-teal-50 px-8 py-3 rounded-lg font-semibold transition-colors duration-200">
                        Lihat Laboratorium
                    </a>
                    <a href="#dosens" class="border-2 border-white text-white hover:bg-white hover:text-teal-600 px-8 py-3 rounded-lg font-semibold transition-colors duration-200">
                        Lihat Dosen
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-teal-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Database</h3>
                    <p class="text-gray-600 text-sm">Sistem manajemen data</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-teal-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Penelitian</h3>
                    <p class="text-gray-600 text-sm">Riset dan pengembangan</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-teal-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Tugas Akhir</h3>
                    <p class="text-gray-600 text-sm">Bimbingan mahasiswa</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-teal-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Pengabdian</h3>
                    <p class="text-gray-600 text-sm">Layanan masyarakat</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Labs Section -->
        <section id="labs" class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Laboratorium</h2>
                    <p class="text-gray-600">Fasilitas laboratorium yang tersedia</p>
                </div>
                <a href="{{ route('lab.index') }}" class="text-teal-600 hover:text-teal-700 font-semibold flex items-center">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($labs as $lab)
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
                            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">{{ $lab->proyeks_count }} Proyek</span>
                            <a href="{{ route('lab.show', ['slug' => $lab->slug]) }}" class="text-teal-600 hover:text-teal-700 font-semibold text-sm">
                                Lihat Detail →
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        <!-- Dosens Section -->
        <section id="dosens" class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Dosen</h2>
                    <p class="text-gray-600">Tim pengajar dan peneliti</p>
                </div>
                <a href="{{ route('dosen.index') }}" class="text-teal-600 hover:text-teal-700 font-semibold flex items-center">
                    Lihat Semua
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($dosens as $dosen)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 text-center">
                        @if($dosen->foto)
                        <img src="{{ asset('storage/' . $dosen->foto) }}" alt="{{ $dosen->nama }}" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover">
                        @else
                        <div class="w-20 h-20 rounded-full bg-gray-100 mx-auto mb-4 flex items-center justify-center">
                            <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        @endif
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $dosen->nama }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $dosen->jabatan }}</p>
                        
                        @if($dosen->bidangKeahlians->count() > 0)
                        <div class="flex flex-wrap justify-center gap-2 mb-4">
                            @foreach($dosen->bidangKeahlians->take(2) as $bidang)
                            <span class="bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-full">{{ $bidang->nama_bidang }}</span>
                            @endforeach
                            @if($dosen->bidangKeahlians->count() > 2)
                            <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">+{{ $dosen->bidangKeahlians->count() - 2 }}</span>
                            @endif
                        </div>
                        @endif
                        
                        <a href="{{ route('dosen.show', ['dosen' => $dosen]) }}" class="text-teal-600 hover:text-teal-700 font-semibold text-sm">
                            Lihat Profil →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>
