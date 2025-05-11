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