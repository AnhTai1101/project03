<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'action';
    public function Actions()
    {
        return $this->hasMany('App\Actions', 'action_id', 'id');
    }
}
