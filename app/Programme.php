<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Faculty;

class Programme extends Model
{
     protected $guarded =[];
      public function programmeStructures(){
    	return $this->hasMany(ProgrammeStructure::class);
    }
     public function faculties(){
    	return $this->hasOne('\App\Faculty','id');
    }
    public function campus(){
    	return $this->hasOne(Campus::class);
    }
}
