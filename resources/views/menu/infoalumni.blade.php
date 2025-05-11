<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Alumni - BKK SMKN 1 Bengkulu</title>
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

            <form method="GET" action="{{ route('infoalumni') }}" class="w-full md:w-auto flex items-center space-x-2">
                <div class="relative flex-grow">
                    <input type="text" name="search" placeholder="Cari Alumni..." value="{{ request('search') }}"
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
            <h2 class="text-3xl md:text-4xl font-bold text-teal-800 mb-2">INFO ALUMNI</h2>
            <div class="w-20 h-1 bg-teal-600 mx-auto"></div>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">Temukan informasi tentang alumni SMKN 1 Bengkulu yang telah sukses dalam karir mereka</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            @foreach ($infoAlumni as $alumni)
                <div class="card bg-white p-6 rounded-xl shadow-md flex flex-col h-full border border-gray-100 hover:border-teal-200">
                    <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded-lg overflow-hidden mb-4">
                        @if ($alumni->gambar)
                            <img src="{{ asset('storage/' . $alumni->gambar) }}" 
                                 alt="Gambar {{ $alumni->judul }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-105">
                        @else
                            <div class="text-gray-400 flex flex-col items-center">
                                <i class="fas fa-user-graduate text-4xl mb-2"></i>
                                <span>Alumni SMKN 1 Bengkulu</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-xl text-gray-800 mb-2">{{ $alumni->judul }}</h3>
                        @if ($alumni->subjudul)
                            <h4 class="text-gray-600 text-sm mb-3">{{ $alumni->subjudul }}</h4>
                        @endif
                        
                        <div class="flex flex-wrap mb-3">
                            <span class="info-badge">
                                <i class="fas fa-user"></i> {{ $alumni->author }}
                            </span>
                            <span class="info-badge">
                                <i class="fas fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($alumni->tanggal)->format('d M Y') }}
                            </span>
                        </div>
                        
                        <p class="text-gray-700 mb-4">{{ Str::limit($alumni->deskripsi, 120) }}</p>
                        
                        @if ($alumni->tags)
                            <div class="mb-4">
                                @foreach (explode(',', $alumni->tags) as $tag)
                                    <span class="inline-block bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-full mr-1 mb-1">
                                        #{{ trim($tag) }}
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mt-auto">
                        <button onclick="openModal('{{ $alumni->id }}')" 
                                class="read-more-btn w-full bg-gradient-to-r from-teal-600 to-teal-700 text-white px-4 py-3 rounded-lg hover:from-teal-700 hover:to-teal-800 transition-all shadow-md">
                            <i class="fas fa-book-open mr-2"></i> Baca Selengkapnya
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div id="modal-{{ $alumni->id }}" class="modal">
                    <div class="modal-content">
                        <span class="close-modal" onclick="closeModal('{{ $alumni->id }}')">
                            <i class="fas fa-times"></i>
                        </span>

                        <div class="modal-body">
                            <div class="mb-8">
                                @if ($alumni->gambar)
                                    <div class="w-full h-72 mb-6 rounded-xl overflow-hidden shadow-lg">
                                        <img 
                                            src="{{ asset('storage/' . $alumni->gambar) }}" 
                                            alt="Gambar {{ $alumni->judul }}" 
                                            class="w-full h-full object-cover zoomable-image"
                                            onclick="zoomImage('{{ asset('storage/' . $alumni->gambar) }}')"
                                        >
                                    </div>
                                @endif

                                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                                    <div>
                                        <h2 class="text-3xl font-bold text-teal-800">{{ $alumni->judul }}</h2>
                                        @if ($alumni->subjudul)
                                            <h3 class="text-xl text-gray-700 mt-1">{{ $alumni->subjudul }}</h3>
                                        @endif
                                    </div>
                                    
                                    <div class="mt-3 md:mt-0">
                                        @if ($alumni->tags)
                                            <div class="flex flex-wrap">
                                                @foreach (explode(',', $alumni->tags) as $tag)
                                                    <span class="inline-block bg-teal-100 text-teal-800 text-xs px-2 py-1 rounded-full mr-1 mb-1">
                                                        #{{ trim($tag) }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center text-gray-600 gap-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-user mr-2 text-teal-600"></i>
                                        <span>{{ $alumni->author }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar-alt mr-2 text-teal-600"></i>
                                        <span>{{ \Carbon\Carbon::parse($alumni->tanggal)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="prose max-w-none">
                                <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                                    {{ $alumni->deskripsi }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex justify-center">
            {{ $infoAlumni->onEachSide(1)->links() }}
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