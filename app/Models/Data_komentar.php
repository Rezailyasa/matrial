<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_komentar extends Model
{
    protected $table = 'data_komentar';
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
