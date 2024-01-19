<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JadwalSidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Dosen;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class JadwalSidangController extends Controller
{
    /** Sidang Proposal page */
    public function jadwalSidangProposal()
    {
        $jadwalSidangProposal = JadwalSidang::where('user_id', Auth::id())
        ->where('jenis_sidang', 'proposal')
        ->get();

        foreach ($jadwalSidangProposal as $jadwal) {
            $jadwal->formatted_date = Carbon::parse($jadwal->created_at)->format('l, F j, Y');
        }
        return view('student.tab.sidangproposal', compact('jadwalSidangProposal'));
    }

    /** Sidang Hasil page */
    public function jadwalSidangHasil()
    {
        $jadwalSidangHasil = JadwalSidang::where('user_id', Auth::id())
        ->where('jenis_sidang', 'hasil')
        ->get();
        foreach ($jadwalSidangHasil as $jadwal) {
            $jadwal->formatted_date = Carbon::parse($jadwal->created_at)->format('l, F j, Y');
        }
        return view('student.tab.sidanghasil', compact('jadwalSidangHasil'));
    }

    /** Sidang Skripsi page*/
    public function jadwalSidangSkripsi()
    {
        $jadwalSidangSkripsi = JadwalSidang::where('user_id', Auth::id())
        ->where('jenis_sidang', 'skripsi')
        ->get();
        foreach ($jadwalSidangSkripsi as $jadwal) {
            $jadwal->formatted_date = Carbon::parse($jadwal->created_at)->format('l, F j, Y');
        }
        return view('student.tab.sidangskripsi', compact('jadwalSidangSkripsi'));
    }

    public function jadwalSidangMahasiswa(){
        return view('dosen.dosenjadwalsidang_view');
    }

    /** student add Jadwal sidang page */
    public function studentaddJadwalSidang()
    {
        $dosens = Dosen::all();
        return view('student.add-jadwalsidang-student', compact('dosens'));
    }
    public function studentsaveJadwalSidang(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'judul_skripsi' => 'required|string',
            'jenis_sidang' => 'required|in:proposal,hasil,skripsi',
            'deskripsi' => 'required|string',
            'tanggal_sidang' => 'required|date',
            'waktu_sidang' => 'required|in:08:00-10:00,10:30-12:30,13:30-15:30',
            'dosen_pembimbing_1_id' => 'required|exists:dosen,user_id',
            'dosen_pembimbing_2_id' => 'required|exists:dosen,user_id',
            'dosen_penguji_1_id' => 'required|exists:dosen,user_id',
            'dosen_penguji_2_id' => 'required|exists:dosen,user_id',
            'dosen_penguji_3_id' => 'required|exists:dosen,user_id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('student/addJadwalSidang')->withErrors($validator)->withInput();
        }

        $formattedDate = Carbon::createFromFormat('d-m-Y', $request->input('tanggal_sidang'))->format('Y-m-d');

        // Check Dosen availability
        $dosenPembimbing1 = $request->input('dosen_pembimbing_1_id');
        $dosenPembimbing2 = $request->input('dosen_pembimbing_2_id');
        $dosenPenguji1 = $request->input('dosen_penguji_1_id');
        $dosenPenguji2 = $request->input('dosen_penguji_2_id');
        $dosenPenguji3 = $request->input('dosen_penguji_3_id');
        $tanggalSidang = $formattedDate;
        $waktuSidang = $request->input('waktu_sidang');

        if ($this->isDosenAvailable($dosenPembimbing1, $tanggalSidang, $waktuSidang) &&
            $this->isDosenAvailable($dosenPembimbing2, $tanggalSidang, $waktuSidang) &&
            $this->isDosenAvailable($dosenPenguji1, $tanggalSidang, $waktuSidang) &&
            $this->isDosenAvailable($dosenPenguji2, $tanggalSidang, $waktuSidang) &&
            $this->isDosenAvailable($dosenPenguji3, $tanggalSidang, $waktuSidang)) {

            // Create a new JadwalSidang instance and save it
            JadwalSidang::create([
                'user_id' => Auth::id(),
                'judul_skripsi' => $request->input('judul_skripsi'),
                'jenis_sidang' => $request->input('jenis_sidang'),
                'deskripsi' => $request->input('deskripsi'),
                'tanggal_sidang' => $formattedDate,
                'waktu_sidang' => $waktuSidang,
                'dosen_pembimbing_1_id' => $dosenPembimbing1,
                'dosen_pembimbing_2_id' => $dosenPembimbing2,
                'dosen_penguji_1_id' => $dosenPenguji1,
                'dosen_penguji_2_id' => $dosenPenguji2,
                'dosen_penguji_3_id' => $dosenPenguji3,
                // Add other fields as needed
            ]);

            // Redirect back with a success message
            Alert::success('Success', 'Jadwal Sidang added successfully!');
            return redirect()->route('student/simpanjadwalsidangproposal')->with('success', 'Jadwal Sidang added successfully!');
        } else {
            // Redirect back with an error message
            Alert::error('Maaf Jadwal Dosen Penuh', 'Tolong cari tanggal dan waktu yang lain. Tetap semangat!')->persistent(true, true);
            return redirect()->route('student/addJadwalSidang')->with('error', 'One or more Dosen is not available at the selected date and time.');
        }
    }

    private function isDosenAvailable($dosenId, $tanggalSidang, $waktuSidang)
    {
        $count = JadwalSidang::where(function ($query) use ($dosenId, $tanggalSidang) {
            $query->where('dosen_pembimbing_1_id', $dosenId)
                ->orWhere('dosen_pembimbing_2_id', $dosenId)
                ->orWhere('dosen_penguji_1_id', $dosenId)
                ->orWhere('dosen_penguji_2_id', $dosenId)
                ->orWhere('dosen_penguji_3_id', $dosenId);
        })
        ->where('tanggal_sidang', $tanggalSidang)
        ->count();

        // Adjust the limit as needed, for example, limit to 2 times in a day
        if ($count >= 2) {
            return false; // Dosen has reached the limit of two schedules in a day
        }

        // Check if the dosen has a conflicting schedule
        $conflictingSchedule = JadwalSidang::where(function ($query) use ($dosenId, $tanggalSidang, $waktuSidang) {
                $query->where('dosen_pembimbing_1_id', $dosenId)
                    ->orWhere('dosen_pembimbing_2_id', $dosenId)
                    ->orWhere('dosen_penguji_1_id', $dosenId)
                    ->orWhere('dosen_penguji_2_id', $dosenId)
                    ->orWhere('dosen_penguji_3_id', $dosenId);
            })
            ->where('tanggal_sidang', $tanggalSidang)
            ->where('waktu_sidang', $waktuSidang)
            ->exists();

        return !$conflictingSchedule;
    }
}
