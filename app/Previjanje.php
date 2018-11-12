<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Previjanje extends Model
{
  /*
  Foreign Key in Previjanje, Pacijent ID
*/

    public function pacijent(){

    	return $this->hasMAny('App\Pacijent');
    }

   /*
  Foreign Key in Previjanje, User ID
   */
    public function user(){
    	return $this->hasMany('App\User');
    }
}
