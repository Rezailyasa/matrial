<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_master_materi extends Model
{
    protected $table = 'data_master_materi';
    use HasFactory;
    public function data_judul_materi()
    {
        return $this->hasOne(Data_judul_materi::class);
    }
}
