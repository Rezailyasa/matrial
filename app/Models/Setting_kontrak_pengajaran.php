<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_kontrak_pengajaran extends Model
{

    protected $table = 'setting_kontrak_pengajaran';
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
    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun_ajaran::class);
    }
    public function setting_master_materi()
    {
        return $this->hasOne(Setting_master_materi::class);
    }
    public function setting_materi_pertemuan()
    {
        return $this->hasOne(Setting_materi_pertemuan::class);
    }
}
