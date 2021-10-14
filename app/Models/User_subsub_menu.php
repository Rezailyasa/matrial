<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_subsub_menu extends Model
{
    protected $table= 'user_subsub_menu';
  
    protected $primaryKey = 'id';
    use HasFactory;
    public function user_sub_menu()
    {
    	return $this->belongsTo(User_sub_menu::class);
    }
}
