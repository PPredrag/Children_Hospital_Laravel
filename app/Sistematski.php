<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sistematski extends Model
{

	  /*
 		 Foreign Key in Sistematski, Pacijent ID
     */
       public function pacijent(){

    	return $this->hasMAny('App\Pacijent');
    }
    /*
 		 Foreign Key in Sistematski, User ID
     */

    public function user(){
    	return $this->hasMany('App\User');
    }
}
