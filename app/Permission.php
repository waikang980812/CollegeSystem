<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded =[];
     public function roles(){
    	return $this->belongsTo(Roles::class);
    }
}
