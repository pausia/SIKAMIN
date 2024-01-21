<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = [
        'user_id',
        'name_full',
        'nim',
        'dosen_pembimbing_1_id',
        'dosen_pembimbing_2_id',
        'mobile_phone',
        'address',
        'birthdate',
    ];

    public function jadwalPembimbing()
    {
        return $this->hasMany(JadwalSidang::class, 'dosen_pembimbing_1_id')
            ->orWhere('dosen_pembimbing_2_id', $this->user_id);
    }

    public function jadwalPenguji()
    {
        return $this->hasMany(JadwalSidang::class, 'dosen_penguji_1_id')
            ->orWhere('dosen_penguji_2_id', $this->user_id)
            ->orWhere('dosen_penguji_3_id', $this->user_id);
    }

    public function incrementSidangDiikuti()
    {
        $this->increment('sidang_diikuti_hari_ini');
    }

    public function canAttendSidang()
    {
        return $this->sidang_diikuti_hari_ini < 2;
    }

    public function resetSidangDiikuti()
    {
        $this->update(['sidang_diikuti_hari_ini' => 0]);
    }
}
