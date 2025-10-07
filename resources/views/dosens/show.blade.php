<x-app-layout>
    <!-- Header Section -->
    <div class="bg-teal-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                @if($dosen->foto)
                <img src="{{ asset('storage/' . $dosen->foto) }}" alt="{{ $dosen->nama }}" class="w-32 h-32 rounded-full mx-auto mb-6 border-4 border-white object-cover shadow-lg">
                @else
                <div class="w-32 h-32 rounded-full mx-auto mb-6 bg-white/20 border-4 border-white flex items-center justify-center shadow-lg">
                    <svg class="h-16 w-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                @endif
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $dosen->nama }}</h1>
                <p class="text-xl text-teal-100">{{ $dosen->jabatan }}</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <!-- Dosen Info -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Sidebar - Basic Info -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Informasi</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">NIP</h3>
                            <p class="text-gray-900">{{ $dosen->nip }}</p>
                        </div>
                        
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Email</h3>
                            <p class="text-gray-900">{{ $dosen->email }}</p>
                        </div>
                        
                        @if($dosen->link_pribadi_web)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-1">Website</h3>
                            <a href="{{ $dosen->link_pribadi_web }}" target="_blank" class="text-teal-600 hover:text-teal-700 break-all">
                                {{ $dosen->link_pribadi_web }}
                            </a>
                        </div>
                        @endif
                        
                        @if($dosen->bidangKeahlians->count() > 0)
                        <div>
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Bidang Keahlian</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($dosen->bidangKeahlians as $bidang)
                                <span class="bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-full">{{ $bidang->nama_bidang }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2">
                        
                @if($dosen->deskripsi_singkat)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Tentang</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600">{{ $dosen->deskripsi_singkat }}</p>
                    </div>
                </div>
                @endif
                            
                <!-- Projects Section -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-6">Proyek</h2>
                    
                    @if($dosen->proyeks->count() > 0)
                    <div class="space-y-6">
                        @foreach($dosen->proyeks as $proyek)
                        <div class="bg-gray-50 rounded-lg p-6 hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex items-start">
                                @if($proyek->foto)
                                <img src="{{ asset('storage/' . $proyek->foto) }}" alt="{{ $proyek->judul }}" class="w-16 h-16 object-cover rounded-lg mr-4">
                                @else
                                <div class="w-16 h-16 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                @endif
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $proyek->judul }}</h3>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <span class="bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-full">{{ $proyek->kategori }}</span>
                                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full">{{ $proyek->tahun }}</span>
                                        @if($proyek->lab)
                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">{{ $proyek->lab->nama_lab }}</span>
                                        @endif
                                    </div>
                                    
                                    @if($proyek->mahasiswaProyeks->count() > 0)
                                    <div class="mb-3">
                                        <h4 class="text-sm font-medium text-gray-700 mb-2">Tim Mahasiswa:</h4>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach($proyek->mahasiswaProyeks as $mahasiswa)
                                            <div class="flex items-center bg-white rounded-full px-3 py-1 shadow-sm">
                                                @if($mahasiswa->foto_profil)
                                                <img src="{{ asset('storage/' . $mahasiswa->foto_profil) }}" alt="{{ $mahasiswa->nama_mahasiswa }}" class="w-4 h-4 rounded-full mr-2">
                                                @else
                                                <div class="w-4 h-4 bg-gray-200 rounded-full mr-2"></div>
                                                @endif
                                                <span class="text-xs text-gray-600">{{ $mahasiswa->nama_mahasiswa }}</span>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="flex gap-3">
                                        @if($proyek->link_web_proyek)
                                        <a href="{{ $proyek->link_web_proyek }}" target="_blank" class="text-sm text-teal-600 hover:text-teal-700 flex items-center">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                            </svg>
                                            Website
                                        </a>
                                        @endif
                                        
                                        @if($proyek->link_repo)
                                        <a href="{{ $proyek->link_repo }}" target="_blank" class="text-sm text-teal-600 hover:text-teal-700 flex items-center">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            Repository
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada proyek</h3>
                        <p class="text-gray-600">Belum ada proyek yang terdaftar untuk dosen ini.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
