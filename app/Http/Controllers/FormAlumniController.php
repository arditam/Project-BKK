<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\DB;

class FormAlumniController extends Controller
{
    public function formalumni()
    {
        return view('menu.formalumni');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|unique:alumnis',
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:alumnis',
            'no_hp' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'status' => 'required',
            'profesi' => 'nullable',
            'jabatan' => 'nullable',
            'lokasi_kerja' => 'nullable',
            'gaji_kerja' => 'nullable',
            'alasan_kerja' => 'nullable',
            'kampus' => 'nullable',
            'jurusan_kuliah' => 'nullable',
            'lokasi_kuliah' => 'nullable',
            'alasan_kuliah' => 'nullable',
            'bidang_usaha' => 'nullable',
            'lokasi_wirausaha' => 'nullable',
            'gaji_wirausaha' => 'nullable',
            'alasan_wirausaha' => 'nullable',
        ]);

        try {
            Alumni::create($validatedData);
            return redirect()->route('components.menu')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            // Tangani error
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }
}
