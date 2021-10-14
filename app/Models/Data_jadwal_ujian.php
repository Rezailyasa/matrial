<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_jadwal_ujian extends Model
{
    protected $table = 'data_jadwal_ujian';
    use HasFactory;

    public function setting_mapel_ujian()
    {
        return $this->hasMany(Setting_mapel_ujian::class);
    }
}
