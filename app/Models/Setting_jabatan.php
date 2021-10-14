<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting_jabatan extends Model
{
    use HasFactory;
    protected $table = 'setting_jabatan';

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function user_role()
    {
        return $this->belongsTo(User_role::class);
    }
}
