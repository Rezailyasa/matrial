<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_kontrak_siswa extends Model
{

    protected $table = 'setting_kontrak_siswa';
    use HasFactory;

    public function data_matapelajaran()
    {
        return $this->belongsTo(Data_matapelajaran::class);
    }
    public function data_kelas()
    {
        return $this->belongsTo(Data_kelas::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function setting_mapel_ujian()
    {
        return $this->hasMany(Setting_mapel_ujian::class);
    }
}
