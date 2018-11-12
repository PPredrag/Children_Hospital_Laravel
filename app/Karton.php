<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karton extends Model
{
		/**
		*Data able to be update
		*
		* @var array
	    */
		protected $fillable = ['simptomi','dijagnoza','lecenje','lek'];
         
     /**
     Foreign Key in User 
  	 */
        public function pacijents(){

    	return $this->hasMany('App\Pacijent');
    	
    }

     /**
     Foreign Key in User 
   */
  		public function users(){

    	return $this->hasMany('App\User');
    }
}
