<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacijent extends Model
{ 
    /**
		Data able to be update
	 */
   protected $fillable= ['ime','prezime','imeroditelja','telefon','godiste','lbo','pol'];
}
