<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamKehadiran extends Model
{
    use HasFactory;
    protected $table = 'rekam_kehadiran';
    protected $fillable = ['id_jadwal_sidang', 'id_user', 'bukti_kehadiran_path'];
}
