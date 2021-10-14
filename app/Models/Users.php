<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    use HasFactory;
    public function user_role()
    {
        return $this->belongsTo(User_role::class);
    }
    public function data_komisi()
    {
        return $this->belongsTo(Data_komisi::class);
    }
}
