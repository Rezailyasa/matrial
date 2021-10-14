<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_soal_evaluasi extends Model
{
    protected $table = 'setting_soal_evaluasi';
    use HasFactory;

    public function data_master_soal()
    {
        return $this->belongsTo(Data_master_soal::class);
    }
}
