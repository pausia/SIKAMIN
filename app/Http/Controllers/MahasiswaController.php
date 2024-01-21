<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function accountProfileMahasiswa(){
        $dosens = Dosen::all();
        return view('student.informasimahasiswa',compact('dosens'));
    }
}
