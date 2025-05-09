<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Alumni</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        footer {
            width: 100%;
        }
    </style>
</head>
<body class="bg-gradient-to-b from-[#008b8b]  min-h-screen flex flex-col items-center">

    <!-- Header -->
    <header id="header" class="sticky top-0 bg-white shadow-sm z-50 w-full">
        <div class="container mx-auto px-5 py-4 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-lg font-semibold text-teal-700 hover:text-teal-900 flex items-center space-x-2">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </header>

    <h2 class="text-white text-4xl font-extrabold mb-8 mt-8">Statistik Data Bursa Kerjo Kito</h2>

    <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-lg mb-6">
        <p class="text-gray-700 font-semibold">Total Seluruh Data Alumni</p>
        <div class="text-center text-xl font-bold bg-green-500 text-white rounded-md px-4 py-2">
            {{ \App\Models\Alumni::count() }}
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl w-full px-4">
        <!-- Alumni Jurusan -->
        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4 text-teal-700">Alumni Jurusan</h3>
            <canvas id="chartJurusan"></canvas>
        </div>

        <!-- Alumni per Tahun -->
        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4 text-teal-700">Alumni per Tahun</h3>
            <canvas id="chartTahun"></canvas>
        </div>

        <!-- Rentang Gaji -->
        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4 text-teal-700">Rentang Gaji</h3>
            <canvas id="chartGaji"></canvas>
        </div>

        <!-- Rasio Profesi Alumni -->
        <div class="bg-white/80 backdrop-blur-sm p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-bold mb-4 text-teal-700">Rasio Profesi Alumni</h3>
            <canvas id="chartProfesi"></canvas>
        </div>
    </div>

    <footer class="bg-[#008b8b] text-[#fff8dc] w-full mt-16">
        <div class="container mx-auto p-6 md:p-10">
            <!-- Desktop: Grid dengan dua kolom, Mobile: Stack vertikal -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Kolom Logo & Informasi - Centered on mobile, left-aligned on desktop -->
                <div class="flex flex-col md:flex-row items-center md:items-start text-center md:text-left">
                    <img src="{{ asset('images/logo smk1.png') }}" alt="Logo SMKN 1 Bengkulu" class="h-20 md:h-24 mb-4 md:mb-0" />
                    <div class="md:ml-4">
                        <p class="font-bold">SMK Negeri 1 Bengkulu</p>
                        <p>Jalan Jati No 41,</p>
                        <p>Kelurahan Padang Jati,</p>
                        <p>Kecamatan Ratu Samban,</p>
                        <p>Kota Bengkulu</p>
                        <p>38222</p>
                    </div>
                </div>
                
                <!-- Kolom Ikon Sosial Media - Centered on mobile, right-aligned on desktop -->
                <div class="flex justify-center md:justify-end">
                    <div class="grid grid-cols-4 gap-6 md:gap-8">
                        <a href="https://www.youtube.com/channel/UCydN3u2tCciDrJKo06ug-oQ" class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 md:w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                            </svg>
                        </a>
                        <a href="https://twitter.com/smkn1kotabkl" class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 md:w-12" viewBox="0 0 50 50" fill="currentColor">
                                <path d="M 5.9199219 6 L 20.582031 27.375 L 6.2304688 44 L 9.4101562 44 L 21.986328 29.421875 L 31.986328 44 L 44 44 L 28.681641 21.669922 L 42.199219 6 L 39.029297 6 L 27.275391 19.617188 L 17.933594 6 L 5.9199219 6 z M 9.7167969 8 L 16.880859 8 L 40.203125 42 L 33.039062 42 L 9.7167969 8 z"></path>
                            </svg>
                        </a>
                        <a href="https://web.facebook.com/Smkn1KotaBengkulu/" class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 md:w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="https://instagram.com/bkk_smkn1bengkulu" class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 md:w-12" viewBox="0 0 32 32" fill="#fff">
                                <g data-name="camera android app aplication phone">
                                    <path d="M30.56 8.47a8 8 0 0 0-7-7 64.29 64.29 0 0 0-15.06 0 8 8 0 0 0-7 7 64.29 64.29 0 0 0 0 15.06 8 8 0 0 0 7 7 64.29 64.29 0 0 0 15.06 0 8 8 0 0 0 7-7 64.29 64.29 0 0 0 0-15.06zM8.7 3.42a63.65 63.65 0 0 1 14.6 0 6 6 0 0 1 5.28 5.28A63 63 0 0 1 29 15h-5a8 8 0 0 0-15.93 0H3a63 63 0 0 1 .39-6.3A6 6 0 0 1 8.7 3.42zM22 16a6 6 0 1 1-6-6 6 6 0 0 1 6 6zm1.3 12.58a63.65 63.65 0 0 1-14.6 0 6 6 0 0 1-5.28-5.28A63 63 0 0 1 3 17h5a8 8 0 0 0 15.86 0h5a63 63 0 0 1-.39 6.3 6 6 0 0 1-5.17 5.28z"/>
                                    <path d="M16 12a4 4 0 1 0 4 4 4 4 0 0 0-4-4zm0 6a2 2 0 1 1 2-2 2 2 0 0 1-2 2z"/>
                                    <circle cx="24" cy="8" r="1"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Divider Line -->
            <div class="border-t border-white my-6"></div>
            
            <!-- Bagian Hubungi Kami dan Kontak Tambahan -->
            <div class="w-full">
                <p class="font-semibold tracking-wider text-sm text-center mb-4">Hubungi kami di:</p>
                <div class="flex flex-col md:flex-row justify-center items-center md:space-x-8 space-y-4 md:space-y-0">
                    <a href="http://wa.me/6289628893111" class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 512 512">
                            <path fill="#dfe900" d="M255.995 73.82A182.18 182.18 0 1 0 438.185 256a182.183 182.183 0 0 0-182.19-182.18zm93.956 251.72c-7.823 12.093-14.617 24.635-47.285 25.382-33.399.035-67.931-27.624-93.085-55.213-25.111-24.433-48.35-55.986-48.314-86.572.747-32.678 13.298-39.48 25.383-47.285a12.372 12.372 0 0 1 12.384 2.232c5.757 5.001 31.007 30.26 31.007 30.26s8.974 7.49 2.778 15.778c-4.922 6.608-16.287 18.773-17.78 20.372l4.271 8.033c5.704 9.404 16.576 25.928 32.854 39.323 10.986 9.017 29.558 18.923 29.558 18.914 2.672-2.479 13.763-12.761 19.95-17.385 8.298-6.205 15.786 2.778 15.786 2.778s25.26 25.26 30.27 31.024a12.361 12.361 0 0 1 2.223 12.358z" data-name="Call"/>
                        </svg>
                        <span class="text-xs mt-2">Maya</span>
                    </a>
                    <a href="http://wa.me/6282261962048" class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" viewBox="0 0 512 512">
                            <path fill="#dfe900" d="M255.995 73.82A182.18 182.18 0 1 0 438.185 256a182.183 182.183 0 0 0-182.19-182.18zm93.956 251.72c-7.823 12.093-14.617 24.635-47.285 25.382-33.399.035-67.931-27.624-93.085-55.213-25.111-24.433-48.35-55.986-48.314-86.572.747-32.678 13.298-39.48 25.383-47.285a12.372 12.372 0 0 1 12.384 2.232c5.757 5.001 31.007 30.26 31.007 30.26s8.974 7.49 2.778 15.778c-4.922 6.608-16.287 18.773-17.78 20.372l4.271 8.033c5.704 9.404 16.576 25.928 32.854 39.323 10.986 9.017 29.558 18.923 29.558 18.914 2.672-2.479 13.763-12.761 19.95-17.385 8.298-6.205 15.786 2.778 15.786 2.778s25.26 25.26 30.27 31.024a12.361 12.361 0 0 1 2.223 12.358z" data-name="Call"/>
                        </svg>
                        <span class="text-xs mt-2">Fachri</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Chart.js scripts -->
    <script>
        var ctxJurusan = document.getElementById('chartJurusan').getContext('2d');
        new Chart(ctxJurusan, {
            type: 'bar',
            data: {
                labels: @json($jurusanData->pluck('jurusan')),
                datasets: [{
                    label: 'Jumlah Data Lulusan',
                    data: @json($jurusanData->pluck('total')),
                    backgroundColor: 'rgba(52, 168, 83, 0.7)'
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } }
            }
        });

        var ctxTahun = document.getElementById('chartTahun').getContext('2d');
        new Chart(ctxTahun, {
            type: 'line',
            data: {
                labels: @json($tahunData->pluck('tahun_lulus')),
                datasets: [{
                    label: 'Lulusan per Tahun',
                    data: @json($tahunData->pluck('total')),
                    borderColor: '#2563EB',
                    fill: false
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } }
            }
        });

        var ctxGaji = document.getElementById('chartGaji').getContext('2d');
        new Chart(ctxGaji, {
            type: 'pie',
            data: {
                labels: @json(array_keys($gajiData)),
                datasets: [{
                    data: @json(array_values($gajiData)),
                    backgroundColor: ['#EF4444', '#3B82F6', '#8B5CF6', '#10B981']
                }]
            }
        });

        var ctxProfesi = document.getElementById('chartProfesi').getContext('2d');
        new Chart(ctxProfesi, {
            type: 'doughnut',
            data: {
                labels: @json(array_keys($profesiData)),
                datasets: [{
                    data: @json(array_values($profesiData)),
                    backgroundColor: ['#F472B6', '#6366F1', '#22D3EE', '#A1A1AA']
                }]
            }
        });
    </script>
</body>
</html>
