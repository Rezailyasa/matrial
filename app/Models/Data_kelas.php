<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_kelas extends Model
{

    protected $table = 'data_kelas';
    use HasFactory;
    public function data_jurusan()
    {
        return $this->belongsTo(Data_jurusan::class);
    }

}
