<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_mapel_ujian extends Model
{
    use HasFactory;
    protected $table = 'setting_mapel_ujian';
    public function setting_kontrak_pengajaran()
    {
        return $this->belongsTo(Setting_kontrak_pengajaran::class);
    }
    public function data_jadwal_ujian()
    {
        return $this->belongsTo(Data_jadwal_ujian::class);
    }
    public function setting_ujian_master_soal()
    {
        return $this->belongsTo(Setting_ujian_master_soal::class);
    }
}
