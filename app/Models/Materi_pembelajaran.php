<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi_pembelajaran extends Model
{

    protected $table = 'materi_pembelajaran';
    use HasFactory;
    public function Setting_kontrak_pengajaran()
    {
        return $this->belongsTo(setting_kontrak_pengajaran::class);
    }
}
