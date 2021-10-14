<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_master_soal extends Model
{
    protected $table = 'data_master_soal';
    use HasFactory;

    public function setting_mapel_ujian()
    {
        return $this->hasMany(Setting_mapel_ujian::class);
    }
    public function setting_ujian_master_soal()
    {
        return $this->belongsTo(Setting_ujian_master_soal::class);
    }
}
