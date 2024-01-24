<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalSidang;

class DosenController extends Controller
{
    public function dosenMahasiwaBimbinganList(){
        $dosenId = Auth::user()->id; // Menggunakan ID dari user yang sedang login, sesuaikan dengan struktur user Anda

        // Mengambil mahasiswa yang dibimbing oleh dosen tersebut
        $listbimbingan = Mahasiswa::where('dosen_pembimbing_1_id', $dosenId)
            ->orWhere('dosen_pembimbing_2_id', $dosenId)
            ->with('jadwalSidang') // Menggunakan eager loading untuk memuat relasi jadwalSidang
            ->get();
        return view('dosen.listdosenmahasiswabimbingan', compact('listbimbingan'));
    }

    public function dosenMahasiwaBimbinganGrid(){
        return view('dosen.griddosenmahasiswabimbingan');
    }
}
