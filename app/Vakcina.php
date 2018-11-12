<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vakcina extends Model
{ 
	/**
     * Data able to be updated.
     *
     * @var array
     */
	protected $fillable = ['bcg','hbprva','hbdruga','hbtreca','hbtridoze','dtpprva','dtpdruga','dtptreca','dtpp1','opvprva','opvdruga','opvtreca','opvp1','opvp2','opvp3','mmrb','mmrp','hibprva','hibdruga','hibtreca','dtp2','dtp3'];

	/*
  		Foreign Key in Vakcina, Pacijent ID
   */

    public function pacijent(){
    	return $this->hasMany('App\Pacijents');
    }
  
   /*
  		Foreign Key in Vakcina, User ID
   */
    public function user(){

    	return $this->hasMany('App\User');
    }
}
