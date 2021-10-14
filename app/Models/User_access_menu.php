<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_access_menu extends Model
{
    protected $table= 'user_access_menu';
    
    protected $fillabel = ['id','user_role_id','user_menu_id'];

       public function user_role()
    {
    	return $this->belongsTo(User_role::class);
    }
}
