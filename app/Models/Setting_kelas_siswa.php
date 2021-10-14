<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_kelas_siswa extends Model
{

    protected $table = 'setting_kelas_siswa';
    use HasFactory;

    public function tahun_ajaran()
    {
        return $this->belongsTo(Tahun_ajaran::class);
    }
    public function data_kelas()
    {
        return $this->belongsTo(Data_kelas::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
