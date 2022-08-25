<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
     protected $guarded =[];
     public function programmes(){
    	return $this->hasMany(Programme::class);
    }
}
