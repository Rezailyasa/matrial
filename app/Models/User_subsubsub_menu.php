<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_subsubsub_menu extends Model
{
    protected $table = 'user_subsubsub_menu';

    protected $primaryKey = 'id';
    use HasFactory;
    public function user_subsub_menu()
    {
        return $this->belongsTo(User_subsub_menu::class);
    }
}
