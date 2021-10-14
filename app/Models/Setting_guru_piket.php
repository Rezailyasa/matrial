<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_guru_piket extends Model
{
    use HasFactory;
    protected $table = 'setting_guru_piket';

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
