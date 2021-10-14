<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_absen_matapelajaran extends Model
{
    use HasFactory;
    protected $table = 'data_absen_matapelajaran';
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
