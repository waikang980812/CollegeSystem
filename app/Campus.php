<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
     protected $guarded =[];
       public function programmes(){
    	return $this->belongsTo(Programme::class);
    }
}
