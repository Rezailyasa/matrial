<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_ujian_master_soal extends Model
{
    use HasFactory;
    protected $table = 'setting_ujian_master_soal';
    public function data_master_soal()
    {
        return $this->belongsTo(Data_master_soal::class);
    }
    public function data_jadwal_ujian()
    {
        return $this->belongsTo(Data_jadwal_ujian::class);
    }
    public function setting_mapel_ujian()
    {
        return $this->hasOne(Setting_mapel_ujian::class);
    }
}
