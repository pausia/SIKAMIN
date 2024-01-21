<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ProfileSettingController extends Controller
{
    public function settingProfile($id)
    {
        $studentProfile = Mahasiswa::where('id',$id)->first();
        return view('setting.settings', compact('mahasiswaProfile'));
    }
}
