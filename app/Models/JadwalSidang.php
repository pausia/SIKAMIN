<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class JadwalSidang extends Model
{
    use HasFactory;
    protected $table = 'jadwal_sidang';
    protected $dispatchesEvents = [
        'created' => 'App\Events\JadwalSidangCreated',
    ];
    protected $fillable = [
        'user_id',
        'dosen_pembimbing_1_id',
        'dosen_pembimbing_2_id',
        'dosen_penguji_1_id',
        'dosen_penguji_2_id',
        'dosen_penguji_3_id',
        'jenis_sidang',
        'judul_skripsi',
        'tanggal_sidang',
        'deskripsi',
        'bimbingan_status',
        'revisi_dosen',
        'waktu_sidang',
        'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'user_id', 'user_id');
    }    

    public function pembimbing1()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_1_id');
    }

    public function pembimbing2()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_2_id');
    }

    public function penguji1()
    {
        return $this->belongsTo(Dosen::class, 'dosen_penguji_1_id');
    }

    public function penguji2()
    {
        return $this->belongsTo(Dosen::class, 'dosen_penguji_2_id');
    }

    public function penguji3()
    {
        return $this->belongsTo(Dosen::class, 'dosen_penguji_3_id');
    }

}
