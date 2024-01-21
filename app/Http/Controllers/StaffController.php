<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function staffMahasiswaList(){
        $stafflistmahasiswa = Mahasiswa::all(); // Assuming Student is your model name
        return view('staff.stafflistmahasiswa', compact('stafflistmahasiswa'));
    }

    public function staffAturJadwal(){
        return view('staff.staffaturjadwal');
    }

    public function staffMahasiswaEdit($id){
        $stafflistmahasiswa = Mahasiswa::all(); // Assuming Student is your model name
        return view('staff.staffeditmahasiswa', compact('stafflistmahasiswa'));
    }

    public function staffMahasiswaUpdate(Request $request){

    }
}
