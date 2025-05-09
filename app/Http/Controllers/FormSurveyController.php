<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;

class FormSurveyController extends Controller
{
    public function formsurvey()
    {
        return view('menu.formsurvey');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|unique:survey,nisn',
            'nama' => 'required',
            'jurusan' => 'required',
            'tahun_ajaran' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'email' => 'required|email|unique:survey,email',
            'whatsapp' => 'required',
            'alasan_memilih_smk' => 'required',
            'setelah_lulus' => 'required',
            'kuliah' => 'nullable|string',
            'jurusan_kuliah' => 'nullable|string',
            'kerja' => 'nullable|string',
            'bidang_kerja' => 'nullable|string',
            'posisi_kerja' => 'nullable|string',
            'wirausaha' => 'nullable|string',
            'pendapat' => 'required',
            'kesan' => 'required',
            'cita_cita' => 'required',
            'pelajaran_favorit' => 'required',
        ]);

        try {
            Survey::create($validatedData);
            return redirect()->route('components.menu')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }
}
