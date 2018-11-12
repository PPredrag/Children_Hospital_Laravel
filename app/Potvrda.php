<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Potvrda extends Model
{
/*
  Foreign Key in Potvrda, Pacijent ID
**/

    public function pacijent(){
    	return $this->hasMany('App\Pacijent');
    }

/*
  Foreign Key in Potvrda, User ID
**/
     public function user(){

    	return $this->hasMany('App\User');
    }
}
