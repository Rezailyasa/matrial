<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_judul_materi extends Model
{

    protected $table = 'data_judul_materi';
    use HasFactory;
    public function data_isi_materi()
    {
        return $this->hasMany(Data_isi_materi::class);
    }
}
