<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun_ajaran extends Model
{

    protected $table = 'tahun_ajaran';
    use HasFactory;
    public function data_semester()
    {
        return $this->belongsTo(Data_semester::class);
    }
}
