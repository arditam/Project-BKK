<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Lowongan Kerja - BKK SMKN 1 Bengkulu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
            background-image: url('/images/bg12.jpg');
            background-size: cover;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 700px;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .close-modal {
            position: absolute;
            right: 15px;
            top: 15px;
            font-size: 24px;
            color: #666;
            cursor: pointer;
            transition: color 0.2s;
            z-index: 2;
        }

        .close-modal:hover {
            color: #000;
        }

        .zoomable-image {
            cursor: zoom-in;
        }

        .zoom-overlay {
            display: none;
            position: fixed;
            z-index: 100;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            overflow: auto;
            text-align: center;
            padding: 20px;
            cursor: zoom-out;
        }

        .zoom-overlay img {
            max-width: 90%;
            max-height: 90vh;
            margin: auto;
            display: block;
        }

        .zoom-close {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            z-index: 101;
        }
    </style>
</head>

<body>
    <!-- HEADER -->
    <header id="header" class="sticky top-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-5 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-semibold text-teal-700 hover:text-teal-900 flex items-center space-x-2">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>

            <!-- GANTI GET STARTED DENGAN SEARCH -->
            <form method="GET" action="{{ route('infolowongan') }}" class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Cari Lowongan..." value="{{ request('search') }}"
                    class="p-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="submit" class="px-3 py-2 bg-teal-700 text-white rounded-md hover:bg-teal-800 transition">
                    Cari
                </button>
            </form>
        </div>
    </header>

    <!-- ZOOM OVERLAY -->
    <div id="zoom-overlay" class="zoom-overlay">
        <span class="zoom-close" onclick="closeZoom()">
            <i class="fas fa-times"></i>
        </span>
        <img id="zoomed-image" src="" alt="Zoomed image">
    </div>

    <!-- MAIN CONTENT -->
    <main class="container mx-auto px-5 py-8">
        <h2 class="text-3xl md:text-4xl font-bold text-teal-700 text-center mb-8">INFO LOWONGAN</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @foreach ($lowongans as $lowongan)
                <div class="bg-white p-5 rounded-xl shadow-lg flex flex-col h-full border border-gray-100">
                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center rounded-md overflow-hidden">
                        @if ($lowongan->gambar)
                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="Gambar {{ $lowongan->judul }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-gray-400">Gambar lowongan</span>
                        @endif
                    </div>
                    <h3 class="mt-3 font-bold text-lg">{{ $lowongan->judul }}</h3>
                    @if ($lowongan->subjudul)
                        <h4 class="mt-2 text-gray-600 text-sm">{{ $lowongan->subjudul }}</h4>
                    @endif
                    <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($lowongan->tanggal_diposting)->format('d M Y') }} - {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d M Y') }}</p>
                    <p class="mt-2 text-gray-800">{{ Str::limit($lowongan->deskripsi, 100) }}</p>
                    @if ($lowongan->tags)
                        <p class="mt-2 text-sm text-blue-600">#{{ $lowongan->tags }}</p>
                    @endif
                    <div class="mt-auto">
                        <button onclick="openModal('{{ $lowongan->id }}')" class="block w-full bg-teal-700 text-white px-4 py-2 rounded-md hover:bg-teal-800 transition text-center">
                            Baca Selengkapnya
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $lowongan->id }}" class="modal">
                    <div class="modal-content">
                        <span class="close-modal" onclick="closeModal('{{ $lowongan->id }}')">
                            <i class="fas fa-times"></i>
                        </span>

                        <div class="modal-body">
                            <div class="mb-6">
                                @if ($lowongan->gambar)
                                    <div class="w-full h-64 mb-4 rounded-lg overflow-hidden">
                                        <img 
                                            src="{{ asset('storage/' . $lowongan->gambar) }}" 
                                            alt="Gambar {{ $lowongan->judul }}" 
                                            class="w-full h-full object-contain zoomable-image"
                                            onclick="zoomImage('{{ asset('storage/' . $lowongan->gambar) }}')"
                                        >
                                    </div>
                                @endif

                                <h2 class="text-2xl font-bold text-teal-700">{{ $lowongan->judul }}</h2>

                                @if ($lowongan->subjudul)
                                    <h3 class="text-xl text-gray-700 mt-2">{{ $lowongan->subjudul }}</h3>
                                @endif

                                <div class="flex flex-row mt-2">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-calendar-alt mr-2"></i>
                                        <span>{{ \Carbon\Carbon::parse($lowongan->tanggal)->format('d M Y') }}</span>
                                    </div>

                                    @if ($lowongan->tanggal_berakhir)
                                        <div class="flex items-center text-red-600 ml-6">
                                            <i class="fas fa-calendar-times mr-2"></i>
                                            <span>Berakhir: {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d M Y') }}</span>
                                        </div>
                                    @endif
                                </div>

                                @if ($lowongan->tags)
                                    <div class="mt-3">
                                        <span class="text-blue-600 font-semibold">#{{ $lowongan->tags }}</span>
                                    </div>
                                @endif
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <div class="font-bold text-lg whitespace-pre-line">
                                    {{ $lowongan->posisi }}
                                </div>

                                <div class="text-gray-800 whitespace-pre-line mt-2">
                                    {{ $lowongan->deskripsi }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-center">
            {{ $lowongans->links() }}
        </div>
    </main>

    <!-- JS -->
    <script>
        function openModal(id) {
            document.getElementById('modal-' + id).style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById('modal-' + id).style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function zoomImage(imgSrc) {
            const overlay = document.getElementById('zoom-overlay');
            const zoomImg = document.getElementById('zoomed-image');
            zoomImg.src = imgSrc;
            overlay.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeZoom() {
            document.getElementById('zoom-overlay').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        window.onclick = function(event) {
            const modals = document.getElementsByClassName('modal');
            for (let i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            }

            if (event.target == document.getElementById('zoom-overlay')) {
                closeZoom();
            }
        }
    </script>
</body>
</html>
