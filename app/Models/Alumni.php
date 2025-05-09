<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis'; 

    protected $fillable = [
        'nisn', 'nama', 'alamat', 'email', 'no_hp', 'jurusan', 'tahun_lulus', 'status',
        'profesi', 'jabatan', 'lokasi_kerja', 'gaji_kerja', 'alasan_kerja',
        'kampus', 'jurusan_kuliah', 'lokasi_kuliah', 'alasan_kuliah',
        'bidang_usaha', 'lokasi_wirausaha', 'gaji_wirausaha', 'alasan_wirausaha'
    ];

    // Accessor untuk format gaji kerja
    public function getGajiKerjaAttribute($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }

    // Accessor untuk format gaji wirausaha
    public function getGajiWirausahaAttribute($value)
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
