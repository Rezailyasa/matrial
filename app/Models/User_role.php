<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    protected $table= 'user_role';
    
    protected $fillabel = ['id','role'];

  public function user_access_menu()
    {
    	return $this->hasMany(User_access_menu::class);
    }
}
