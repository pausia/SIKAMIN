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
        'sidang_terakhir',
        'dosen_pembimbing_1_id',
        'dosen_pembimbing_2_id',
        'mobile_phone',
        'address',
    ];

    public function getDefaults()
    {
        return [
            'progress_sidang' => '0/3',
        ];
    }

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
        return $this->hasOne(JadwalSidang::class, 'user_id', 'user_id');
    }
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->fill($model->getDefaults());
        });
    }
}
