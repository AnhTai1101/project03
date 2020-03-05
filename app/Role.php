<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    public function action()
    {
        return $this->belongsToMany('App\action', 'actions', 'role_id', 'action_id');
    }
}
