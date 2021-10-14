<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_soal_jawaban extends Model
{
    protected $table = 'data_soal_jawaban';
    use HasFactory;

    public function setting_mapel_ujian()
    {
        return $this->hasMany(Setting_mapel_ujian::class);
    }
}
