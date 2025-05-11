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