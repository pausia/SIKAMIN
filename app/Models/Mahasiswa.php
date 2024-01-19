<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['user_id'];
    
    public function jadwalSidang()
    {
        return $this->hasMany(JadwalSidang::class, 'mahasiswa_id');
    }
}
