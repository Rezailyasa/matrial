<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_sub_menu extends Model
{

    protected $table = 'user_sub_menu';

    protected $primaryKey = 'id';
    protected $fillabel = ['user_menu_id', 'title', 'url', 'icon'];

    public function user_menu()
    {
        return $this->belongsTo(User_menu::class);
    }

    public function user_subsub_menu()
    {
        return $this->hasMany(User_subsub_menu::class);
    }
}
