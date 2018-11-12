<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergije extends Model
{ 

	/**
	*	Data able to be update
  *
  *@var array
	*/
  protected $fillable = ['napomene']; 

    /**
     Foreign Key in Alergije, Pacijent ID
   */

    public function pacijent(){

    	return $this->hasMany('App\Pacijent');
    	
    }
}
