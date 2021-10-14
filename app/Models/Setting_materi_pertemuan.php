<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_materi_pertemuan extends Model
{
    use HasFactory;
    protected $table = 'setting_materi_pertemuan';
    public function setting_kontrak_pengajaran()
    {
        return $this->belongsTo(Setting_kontrak_pengajaran::class);
    }
    public function data_judul_materi()
    {
        return $this->belongsTo(Data_judul_materi::class);
    }
    public function data_isi_materi()
    {
        return $this->belongsTo(Data_isi_materi::class);
    }
    public function data_master_soal()
    {
        return $this->belongsTo(Data_master_soal::class);
    }
    public function setting_master_materi()
    {
        return $this->belongsTo(Setting_master_materi::class);
    }

}
