<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_master_materi extends Model
{
    use HasFactory;
    protected $table = 'setting_master_materi';
    public function setting_kontrak_pengajaran()
    {
        return $this->belongsTo(Setting_kontrak_pengajaran::class);
    }
    public function data_master_materi()
    {
        return $this->belongsTo(Data_master_materi::class);
    }
    public function setting_materi_pertemuan()
    {
        return $this->hasOne(Setting_materi_pertemuan::class);
    }
}
