<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $guarded =[];
    public function users(){
    	return $this->hasMany(User::class);
    }
    public function permissions(){
    	return $this->hasOne(Permission::class);
    }
}
