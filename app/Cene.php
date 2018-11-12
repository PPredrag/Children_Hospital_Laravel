<?php

namespace App;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use DB;


class Cene extends Model
{
   /**
     Foreign Key in Cene Pacijent id 
   */

     public function pacijent(){
    	return $this->hasMany('App\Pacijents');
    }
    /**
     Foreign Key in Cene User id 
   */
    public function user(){

    	return $this->hasMany('App\User');
    }

     /**
     *  Return array of last 10 prices from data base
     *
     * 
     * @return  array
     */
    public function brisanje(){

    	 $id_pacijenta = Session::get('id_pacijenta');
         $id_doktor = Auth::user()->id;
               return Cene::join('users','cenes.id_doktor','=','users.id')
                            ->join('pacijents','cenes.id_pacijent','=','pacijents.id')
                             ->select('pacijents.ime','pacijents.prezime','pacijents.imeroditelja','users.name','cenes.id','cenes.created_at','cenes.pregled','cenes.krajPregled','cenes.potvrda','cenes.vakcina','cenes.rane','cenes.sistematski')
                                ->where('id_doktor','=',$id_doktor)
                                ->orderBy('cenes.created_at', 'desc')
                                ->limit(10)
                                ->get();
    }
}
