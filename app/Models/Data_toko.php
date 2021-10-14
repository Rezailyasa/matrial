<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_toko extends Model
{
    protected $table = 'data_toko';
    use HasFactory;

    public function data_biaya_kirim()
    {
        return $this->belongsTo(Data_biaya_kirim::class);
    }
    public function users()
    {
        return $this->belongsTo(Users::class);
    }

}
