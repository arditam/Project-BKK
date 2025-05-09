 <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
   
  body {
      font-family: 'Nunito Sans', sans-serif;
      background-color: #f9fafb;
    }
    
    .card {
      transition: all 0.3s ease;
      height: 100%;
      border: 2px solid transparent;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      background-color: rgba(249, 250, 251, 1);
      border-color: currentColor;
    }
    .arrow {
      transition: transform 0.3s ease;
    }
    .card:hover .arrow {
      transform: translateX(5px);
    }
    .icon-container {
      transition: all 0.3s ease;
    }
    .card:hover .icon-container {
      transform: scale(1.1);
    }

  /* Modal Styles */
#surveyModal .modal-content {
    margin-top: 8rem; /* Tambahkan jarak lebih besar dari header */
}

/* Form Input Styles */
.form-input {
    @apply w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500;
    transition: border-color 0.3s ease; /* Tambahkan transisi untuk border */
}

.form-input:focus {
    border-color: #38b2ac; /* Warna border saat fokus */
}

.form-select {
    @apply w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500;
    transition: border-color 0.3s ease; /* Tambahkan transisi untuk border */
}

.form-select:focus {
    border-color: #38b2ac; /* Warna border saat fokus */
}

/* Tambahkan gaya untuk tombol kirim */
button[type="submit"] {
    transition: background-color 0.3s ease, transform 0.3s ease; /* Tambahkan transisi */
}

button[type="submit"]:hover {
    background-color: #2c7a7b; /* Warna saat hover */
    transform: translateY(-2px); /* Efek angkat saat hover */
}
  </style>
</head>
<body class="bg-gray-100 min-h-screen p-4">
  <div class="container mx-auto px-4">
    <section id="menu" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
      
      <!-- 1. Survey Siswa Card -->
      <a id="surveyBtn" class="card bg-white rounded-xl p-6 flex flex-col items-center text-blue-500 hover:text-blue-600 shadow-md transition-all">
        <div class="icon-container bg-blue-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Survey siswa</h2>
        <p class="text-center text-gray-600 mb-4">Isi survey untuk siswa SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>

      <!-- 3. Form Alumni Card -->
      <a id="alumniFormBtn" class="card bg-white rounded-xl p-6 flex flex-col items-center text-orange-600 hover:text-orange-700 shadow-md">
        <div class="icon-container bg-orange-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Form Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Isi formulir untuk alumni SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>

      <!-- 2. Info Alumni Card -->
      <a href="{{route ('infoalumni')}}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-red-500 hover:text-red-600 shadow-md">
        <div class="icon-container bg-red-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Info Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Informasi tentang alumni SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>
      
      
      
      <!-- 4. Job Vacancy Card -->
      <a href="{{route ('infolowongan')}}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-yellow-600 hover:text-yellow-700 shadow-md">
        <div class="icon-container bg-yellow-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Lowongan Kerja</h2>
        <p class="text-center text-gray-600 mb-4">Informasi lowongan kerja untuk alumni.</p>
        <div class="flex items-center mt-auto">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>

      <!-- 5. Alumni Data Card -->
      <a href="{{ route('filament.admin.auth.login') }}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-green-700 hover:text-green-800 shadow-md">
        <div class="icon-container bg-green-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Data Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Kelola data alumni SMKN 1 Bengkulu.</p>
        <div class="flex items-center mt-auto">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>
      
      <!-- 6. Alumni Stats Card -->
      <a href="{{route ('menu.statistik')}}" class="card bg-white rounded-xl p-6 flex flex-col items-center text-teal-600 hover:text-teal-700 shadow-md">
        <div class="icon-container bg-teal-100 p-4 rounded-xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
          </svg>
        </div>
        <h2 class="text-2xl font-semibold mb-2">Statistik Alumni</h2>
        <p class="text-center text-gray-600 mb-4">Statistik dan analisis data alumni.</p>
        <div class="flex items-center mt-auto">
          
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 arrow" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </a>
    </section>
  </div>
  

 <!-- Survey Modal -->
<div id="surveyModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-3xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-teal-700">Form Isian Survey</h2>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Survey Form -->
        <form action="{{ route('formsurvey.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Personal Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">NISN</label>
                    <input type="text" name="nisn" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama</label>
                    <input type="text" name="nama" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jurusan</label>
                    <select name="jurusan" class="form-select w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="PPLG">PPLG</option>
                        <option value="DKV">DKV</option>
                        <option value="TJKT">TJKT</option>
                        <option value="ULP">ULP</option>
                        <option value="PM">PM</option>
                        <option value="MPLB">MPLB</option>
                        <option value="AKL">AKL</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                    <input type="text" name="alamat" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">WhatsApp</label>
                    <input type="tel" name="whatsapp" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
            </div>

            <!-- Education Choices Section -->
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Alasan Memilih SMK</label>
                    <select name="alasan_memilih_smk" class="form-select w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                        <option value="-">Pilih Opsi</option>
                        <option value="Pilihan Sendiri">Pilihan Sendiri</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="ajakan_teman">Ajakan Teman</option>
                        <option value="letak_sekolah_dekat_rumah">Letak Sekolah Dekat Rumah</option>
                        <option value="setelah_lulus_ingin_cepat_dapat_kerja">Setelah Lulus Ingin Cepat Dapat Kerja</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Setelah lulus nanti saya akan ...</label>
                    <select name="setelah_lulus" class="form-select w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                        <option value="-">Pilih Opsi</option>
                        <option value="Kuliah">Kuliah</option>
                        <option value="Bekerja">Bekerja</option>
                        <option value="Berwirausaha">Berwirausaha</option>
                    </select>
                </div>
            </div>

            <!-- Conditional Fields Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Kuliah</label>
                    <input type="text" name="kuliah" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jurusan Kuliah</label>
                    <input type="text" name="jurusan_kuliah" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Kerja</label>
                    <input type="text" name="kerja" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Bidang Kerja</label>
                    <input type="text" name="bidang_kerja" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Posisi Kerja</label>
                    <input type="text" name="posisi_kerja" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Wirausaha</label>
                    <input type="text" name="wirausaha" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
            </div>

            <!-- Additional Information Section -->
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Menurut anda, apakah lulusan SMK bisa langsung siap bekerja jika lulus sekolah nanti dengan skill yang dimiliki sesuai jurusannya?</label>
                    <input type="text" name="pendapat" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Kesan</label>
                    <input type="text" name="kesan" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Cita cita</label>
                    <input type="text" name="cita_cita" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Pelajaran Favorit</label>
                    <input type="text" name="pelajaran_favorit" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 px-6 rounded-lg w-full transition duration-300">
                Kirim
            </button>
        </form>
    </div>
</div>


<!-- Alumni Form Modal -->
<div id="alumniFormModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden p-4">
    <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-3xl max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-teal-700">Form Alumni</h2>
            <button id="closeAlumniFormModal" class="text-gray-500 hover:text-gray-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('formalumni.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Personal Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">NISN</label>
                    <input type="text" id="nisn" name="nisn" placeholder="NISN" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nomor HP</label>
                    <input type="tel" id="no_hp" name="no_hp" placeholder="Nomor HP" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Jurusan</label>
                    <select id="jurusan" name="jurusan" class="form-select w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="PPLG">PPLG</option>
                        <option value="DKV">DKV</option>
                        <option value="TJKT">TJKT</option>
                        <option value="ULP">ULP</option>
                        <option value="PM">PM</option>
                        <option value="MPLB">MPLB</option>
                        <option value="AKL">AKL</option>
                        <option value="ANM">ANM</option>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Tahun Lulus</label>
                    <select id="tahun_lulus" name="tahun_lulus" class="form-select w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required>
                        <option value="">Pilih Tahun Lulus</option>
                        <script>
                            let year = new Date().getFullYear();
                            for (let i = year; i >= 2000; i--) {
                                document.write(`<option value="${i}">${i}</option>`);
                            }
                        </script>
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Status</label>
                    <select id="status" name="status" class="form-select w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500" required onchange="toggleFields()">
                        <option value="">Pilih Status</option>
                        <option value="Kerja">Bekerja</option>
                        <option value="Kuliah">Kuliah</option>
                        <option value="Wirausaha">Berwirausaha</option>
                        <option value="Tidak">Tidak Bekerja/Kuliah</option>
                    </select>
                </div>
            </div>

            <!-- Conditional Fields -->
            <div id="KerjaFields" style="display: none;" class="space-y-6">
                <h3 class="text-xl font-semibold text-teal-700 mb-4">Informasi Pekerjaan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Profesi</label>
                        <input type="text" name="profesi" placeholder="Profesi" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jabatan</label>
                        <input type="text" name="jabatan" placeholder="Jabatan" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Lokasi Kerja</label>
                        <input type="text" name="lokasi_kerja" placeholder="Lokasi Kerja" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jumlah Gaji</label>
                        <input type="number" name="gaji_kerja" placeholder="Jumlah Gaji" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-2">Alasan Bekerja</label>
                        <textarea name="alasan_kerja" placeholder="Alasan bekerja" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 h-24"></textarea>
                    </div>
                </div>
            </div>

            <div id="KuliahFields" style="display: none;" class="space-y-6">
                <h3 class="text-xl font-semibold text-teal-700 mb-4">Informasi Pendidikan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nama Kampus</label>
                        <input type="text" name="kampus" placeholder="Nama Kampus" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jurusan</label>
                        <input type="text" name="jurusan_kuliah" placeholder="Jurusan" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Lokasi Kuliah</label>
                        <input type="text" name="lokasi_kuliah" placeholder="Lokasi Kuliah" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-2">Alasan Kuliah</label>
                        <textarea name="alasan_kuliah" placeholder="Alasan kuliah" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 h-24"></textarea>
                    </div>
                </div>
            </div>

            <div id="WirausahaFields" style="display: none;" class="space-y-6">
                <h3 class="text-xl font-semibold text-teal-700 mb-4">Informasi Wirausaha</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Bidang Usaha</label>
                        <input type="text" name="bidang_usaha" placeholder="Bidang Usaha" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Lokasi Wirausaha</label>
                        <input type="text" name="lokasi_wirausaha" placeholder="Lokasi Wirausaha" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Jumlah Gaji</label>
                        <input type="number" name="gaji_wirausaha" placeholder="Jumlah Gaji" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-medium mb-2">Alasan Berwirausaha</label>
                        <textarea name="alasan_wirausaha" placeholder="Alasan berwirausaha" class="form-input w-full border rounded px-3 py-2 focus:ring-2 focus:ring-teal-500 focus:border-teal-500 h-24"></textarea>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-3 px-6 rounded-lg w-full transition duration-300">
                Kirim
            </button>
        </form>
    </div>
</div>

  <script>
    
    document.addEventListener('DOMContentLoaded', function() {
      const modal = document.getElementById('surveyModal');
      const closeBtn = document.getElementById('closeModal');
      const surveyBtn = document.getElementById('surveyBtn');
      
      // Open modal when survey button is clicked
      surveyBtn.addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
      });
      
      // Close modal
      closeBtn.addEventListener('click', function() {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Re-enable scrolling
      });
      
      // Close modal when clicking outside
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          modal.classList.add('hidden');
          document.body.style.overflow = 'auto'; // Re-enable scrolling
        }
      });
      
      // Close modal with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
          modal.classList.add('hidden');
          document.body.style.overflow = 'auto'; // Re-enable scrolling
        }
      });

      const alumniFormModal = document.getElementById('alumniFormModal');
      const alumniFormBtn = document.getElementById('alumniFormBtn');
      const closeAlumniFormModal = document.getElementById('closeAlumniFormModal');

      // Open modal
      alumniFormBtn.addEventListener('click', function(e) {
        e.preventDefault();
        alumniFormModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
      });

      // Close modal
      closeAlumniFormModal.addEventListener('click', function() {
        alumniFormModal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Re-enable scrolling
      });

      // Close modal when clicking outside
      alumniFormModal.addEventListener('click', function(e) {
        if (e.target === alumniFormModal) {
          alumniFormModal.classList.add('hidden');
          document.body.style.overflow = 'auto'; // Re-enable scrolling
        }
      });

      // Close modal with Escape key
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !alumniFormModal.classList.contains('hidden')) {
          alumniFormModal.classList.add('hidden');
          document.body.style.overflow = 'auto'; // Re-enable scrolling
        }
      });
    });

    function toggleFields() {
      const status = document.getElementById("status").value;
      document.getElementById("KerjaFields").style.display = status === "Kerja" ? "block" : "none";
      document.getElementById("KuliahFields").style.display = status === "Kuliah" ? "block" : "none";
      document.getElementById("WirausahaFields").style.display = status === "Wirausaha" ? "block" : "none";
    }
  </script>
</body>
</html>