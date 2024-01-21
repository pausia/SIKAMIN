<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $fillable = [
        'user_id',
        'name_full',
        'nim',
        'dosen_pembimbing_1_id',
        'dosen_pembimbing_2_id',
        'mobile_phone',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dosenPembimbing1()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_1_id');
    }

    public function dosenPembimbing2()
    {
        return $this->belongsTo(Dosen::class, 'dosen_pembimbing_2_id');
    }

    public function jadwalSidang()
    {
        return $this->hasMany(JadwalSidang::class, 'mahasiswa_id');
    }
}
