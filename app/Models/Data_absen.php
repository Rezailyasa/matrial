<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_absen extends Model
{
    use HasFactory;
    protected $table = 'data_absen';
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
