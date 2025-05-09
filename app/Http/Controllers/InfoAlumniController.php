<?php

namespace App\Http\Controllers;

use App\Models\InfoAlumni;
use Illuminate\Http\Request;

class InfoAlumniController extends Controller
{
    // Menampilkan daftar alumni
    public function infoalumni(Request $request)
    {
        $search = $request->get('search');
        $infoAlumni = InfoAlumni::when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->paginate(6); // Menampilkan hasil pencarian dengan pagination

        return view('menu.infoalumni', compact('infoAlumni'));
    }

  
}
