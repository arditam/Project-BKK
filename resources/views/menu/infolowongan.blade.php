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
            background-color: #f0fdfa;
            background-image: url('/images/bg12.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-blend-mode: overlay;
        }
        
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            margin: 3% auto;
            padding: 30px;
            border-radius: 12px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.4s;
        }

        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .close-modal {
            position: absolute;
            right: 20px;
            top: 20px;
            font-size: 24px;
            color: #666;
            cursor: pointer;
            transition: all 0.2s;
            z-index: 2;
            background: #f1f1f1;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-modal:hover {
            color: #000;
            transform: rotate(90deg);
            background: #e5e5e5;
        }

        .zoomable-image {
            cursor: zoom-in;
            transition: transform 0.3s;
        }

        .zoomable-image:hover {
            transform: scale(1.02);
        }

        .zoom-overlay {
            display: none;
            position: fixed;
            z-index: 100;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            overflow: auto;
            text-align: center;
            padding: 20px;
            cursor: zoom-out;
            animation: fadeIn 0.3s;
        }

        .zoom-overlay img {
            max-width: 90%;
            max-height: 90vh;
            margin: auto;
            display: block;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        .zoom-close {
            position: absolute;
            top: 30px;
            right: 30px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            z-index: 101;
            transition: transform 0.2s;
        }

        .zoom-close:hover {
            transform: scale(1.2);
        }
        
        .info-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            background-color: #e6fffa;
            color: #0d9488;
            margin-right: 8px;
            margin-bottom: 8px;
        }
        
        .info-badge i {
            margin-right: 5px;
            font-size: 0.7rem;
        }
        
        .read-more-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .read-more-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.5s;
        }
        
        .read-more-btn:hover::after {
            left: 100%;
        }
        
        .section-divider {
            position: relative;
            margin: 30px 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #0d9488, transparent);
        }
        
        .section-divider::before {
            content: '';
            position: absolute;
            left: 50%;
            top: -5px;
            transform: translateX(-50%);
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #0d9488;
        }
        
        .urgent-badge {
            background-color: #fee2e2;
            color: #dc2626;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header id="header" class="sticky top-0 bg-white shadow-sm z-50">
        <div class="container mx-auto px-5 py-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <a href="{{ url('/') }}" class="text-lg font-semibold text-teal-700 hover:text-teal-900 flex items-center space-x-2 transition-colors">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>

            <form method="GET" action="{{ route('infolowongan') }}" class="w-full md:w-auto flex items-center space-x-2">
                <div class="relative flex-grow">
                    <input type="text" name="search" placeholder="Cari Lowongan..." value="{{ request('search') }}"
                        class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent shadow-sm">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-teal-600 hover:text-teal-800">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                <button type="submit" class="px-4 py-3 bg-teal-700 text-white rounded-lg hover:bg-teal-800 transition-all shadow-md hover:shadow-lg">
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
        <div class="text-center mb-10">
            <h2 class="text-3xl md:text-4xl font-bold text-teal-800 mb-2">INFO LOWONGAN</h2>
            <div class="w-20 h-1 bg-teal-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Temukan informasi lowongan kerja terbaru untuk lulusan SMKN 1 Bengkulu</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach ($lowongans as $lowongan)
                <div class="card bg-white p-6 rounded-xl shadow-md flex flex-col h-full border border-gray-100 hover:border-teal-200">
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded-lg overflow-hidden mb-4 relative">
                        @if ($lowongan->gambar)
                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" 
                                 alt="Gambar {{ $lowongan->judul }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        @else
                            <div class="text-gray-400 flex flex-col items-center">
                                <i class="fas fa-briefcase text-4xl mb-2"></i>
                                <span>Lowongan Kerja</span>
                            </div>
                        @endif
                        
                        @if ($lowongan->tanggal_berakhir && \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->isPast())
                            <div class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                                Kadaluarsa
                            </div>
                        @elseif ($lowongan->tanggal_berakhir && \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->diffInDays() < 7)
                            <div class="absolute top-2 right-2 bg-yellow-500 text-white text-xs px-2 py-1 rounded-full">
                                Segera
                            </div>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $lowongan->judul }}</h3>
                        @if ($lowongan->subjudul)
                            <h4 class="text-gray-600 text-sm mb-3">{{ $lowongan->subjudul }}</h4>
                        @endif
                        
                        <div class="flex flex-wrap mb-3">
                            <span class="info-badge">
                                <i class="fas fa-calendar-day"></i> {{ \Carbon\Carbon::parse($lowongan->tanggal_diposting)->format('d M Y') }}
                            </span>
                            @if ($lowongan->tanggal_berakhir)
                                <span class="info-badge {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->diffInDays() < 3 ? 'urgent-badge' : '' }}">
                                    <i class="fas fa-calendar-times"></i> {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d M Y') }}
                                </span>
                            @endif
                        </div>
                        
                        <p class="text-gray-700 mb-4">{{ Str::limit($lowongan->deskripsi, 120) }}</p>
                        
                        @if ($lowongan->tags)
                            <div class="mb-4">
                                @foreach (explode(',', $lowongan->tags) as $tag)
                                    <span class="inline-block bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-full mr-1 mb-1">
                                        #{{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mt-auto">
                        <button onclick="openModal('{{ $lowongan->id }}')" 
                                class="read-more-btn w-full bg-gradient-to-r from-teal-600 to-teal-700 text-white px-4 py-3 rounded-lg hover:from-teal-700 hover:to-teal-800 transition-all shadow-md">
                            <i class="fas fa-book-open mr-2"></i> Baca Selengkapnya
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
                            <div class="mb-8">
                                @if ($lowongan->gambar)
                                    <div class="w-full h-72 mb-6 rounded-xl overflow-hidden shadow-lg">
                                        <img 
                                            src="{{ asset('storage/' . $lowongan->gambar) }}" 
                                            alt="Gambar {{ $lowongan->judul }}" 
                                            class="w-full h-full object-cover zoomable-image"
                                            onclick="zoomImage('{{ asset('storage/' . $lowongan->gambar) }}')"
                                        >
                                    </div>
                                @endif

                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h2 class="text-3xl font-bold text-teal-800">{{ $lowongan->judul }}</h2>
                                        @if ($lowongan->subjudul)
                                            <h3 class="text-xl text-gray-700 mt-1">{{ $lowongan->subjudul }}</h3>
                                        @endif
                                    </div>
                                    
                                    @if ($lowongan->tanggal_berakhir && \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->isPast())
                                        <div class="mt-3 md:mt-0 bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">
                                            <i class="fas fa-exclamation-circle mr-1"></i> Lowongan Kadaluarsa
                                        </div>
                                    @elseif ($lowongan->tanggal_berakhir && \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->diffInDays() < 3)
                                        <div class="mt-3 md:mt-0 bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                            <i class="fas fa-clock mr-1"></i> Segera Berakhir
                                        </div>
                                    @endif
                                </div>

                                <div class="flex flex-wrap items-center text-gray-600 gap-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-day mr-2 text-teal-600"></i>
                                        <span>Diposting: {{ \Carbon\Carbon::parse($lowongan->tanggal_diposting)->format('d M Y') }}</span>
                                    </div>
                                    @if ($lowongan->tanggal_berakhir)
                                        <div class="flex items-center {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->diffInDays() < 3 ? 'text-red-600' : 'text-gray-600' }}">
                                            <i class="fas fa-calendar-times mr-2"></i>
                                            <span>Berakhir: {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d M Y') }}</span>
                                        </div>
                                    @endif
                                </div>

                                @if ($lowongan->tags) <div class="mt-3"> 
                                    <span class="text-teal-700 font-semibold">#{{ $lowongan->tags }}</span> </div> @endif
                            </div>

                            <div class="prose max-w-none">
                                <h3 class="text-2xl font-semibold text-teal-700 mb-4 pb-2 border-b border-teal-100">Posisi</h3>
                                <div class="text-gray-700 leading-relaxed whitespace-pre-line font-medium">
                                    {{ $lowongan->posisi }}
                                </div>
                            </div>

                            <div class="section-divider"></div>

                            <div class="prose max-w-none">
                                <h3 class="text-2xl font-semibold text-teal-700 mb-4 pb-2 border-b border-teal-100">Deskripsi Lowongan</h3>
                                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                                    {{ $lowongan->deskripsi }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            {{ $lowongans->onEachSide(1)->links() }}
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

        // Close modals when clicking outside
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
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = document.getElementsByClassName('modal');
                for (let i = 0; i < modals.length; i++) {
                    if (modals[i].style.display === 'block') {
                        modals[i].style.display = 'none';
                        document.body.style.overflow = 'auto';
                    }
                }
                
                if (document.getElementById('zoom-overlay').style.display === 'block') {
                    closeZoom();
                }
            }
        });
    </script>
</body>
</html>