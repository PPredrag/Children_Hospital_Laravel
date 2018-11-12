<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rane extends Model
{
	 /*
 		 Foreign Key in Rane, Pacijent ID
     */
    public function pacijent(){
    	return $this->hasMany('App\Pacijent');
    }

    /*
 		 Foreign Key in Rane, User ID
     */
    public function user(){
    	return $this->hasMany('App\User');
    }
}
