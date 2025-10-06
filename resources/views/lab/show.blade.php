<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6">{{ $lab->nama_lab }}</h1>
                
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-3">Lokasi</h2>
                    <p class="text-gray-700">{{ $lab->lokasi }}</p>
                </div>
                
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-3">Deskripsi</h2>
                    <div class="prose max-w-none">
                        {!! $lab->deskripsi !!}
                    </div>
                </div>
                
                @if($lab->laborans->count() > 0)
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-3">Staff Laboratorium</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($lab->laborans as $laboran)
                        <div class="bg-gray-50 p-4 rounded-lg shadow">
                            @if($laboran->foto)
                            <img src="{{ asset('storage/' . $laboran->foto) }}" alt="{{ $laboran->nama }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                            @endif
                            <h3 class="text-lg font-medium text-center">{{ $laboran->nama }}</h3>
                            <p class="text-gray-600 text-center">{{ $laboran->jabatan }}</p>
                            <p class="text-gray-500 text-center text-sm mt-1">{{ $laboran->email }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                @if($lab->proyeks->count() > 0)
                <div>
                    <h2 class="text-xl font-semibold mb-3">Proyek Terkait</h2>
                    <div class="space-y-4">
                        @foreach($lab->proyeks as $proyek)
                        <div class="bg-gray-50 p-4 rounded-lg shadow">
                            <h3 class="text-lg font-medium">{{ $proyek->judul }}</h3>
                            <p class="text-gray-600">Oleh: {{ $proyek->dosen->nama }} ({{ $proyek->tahun }})</p>
                            <p class="text-gray-600 mt-1">Kategori: {{ $proyek->kategori }}</p>
                            
                            @if($proyek->link_web_proyek || $proyek->link_repo)
                            <div class="mt-2 flex space-x-3">
                                @if($proyek->link_web_proyek)
                                <a href="{{ $proyek->link_web_proyek }}" target="_blank" class="text-blue-600 hover:underline text-sm">Website Proyek</a>
                                @endif
                                
                                @if($proyek->link_repo)
                                <a href="{{ $proyek->link_repo }}" target="_blank" class="text-blue-600 hover:underline text-sm">Repository</a>
                                @endif
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
