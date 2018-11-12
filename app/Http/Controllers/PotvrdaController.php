<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Potvrda;
use App\User;
use App\cenovnik;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Session;


class PotvrdaController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Store price in session 
     *
     * @return view
     */
    public function prikaziPotvrdu(){
        $data = DB::table('cenovniks')->get();
        foreach ($data as $key => $value) {
            $potvrda = $value->potvrda;
        }
            Session::put([
                   'potvrda'=>$potvrda 
            ]);

        return view('potvrda/potvrda');
    }
    /**
     * Store data for health conformation in DB 
     *
     * @return message
     */
    public function upisPotvrde(Request $request){
    	$this->validate($request,[
    			'potvrda'=>'required'	
    	]);

    	$pacijent = Session::get('id_pacijenta');
    	$doktor = Auth::user()->id;
    	$potvrda = $request['potvrda'];

    	$upis = new Potvrda();	
    	$upis->opis = $potvrda;
    	$upis->id_pacijent = $pacijent;
    	$upis->id_doktor = $doktor;
    	$upis->save();
        $opis = $upis->opis;
        $datum = $upis->created_at;
        Session::put([     /* ovo je za stampu */ 
            'opis'=>$opis,
            'datum'=>$datum
        ]);
        session()->flash('msg',$opis);

    	return redirect()->back()->withSuccess('Uspešno ste evidentirali POTVRDU');

    }
    /**
     * Get health conformation data   
     * 
     * @return $data
     */
    public function ispisPotvrda(){
    	$pacijent = Session::get('id_pacijenta');
    	$doktor = Auth::user()->id;
        $data = DB::table('potvrdas')->join('users', 'potvrdas.id_doktor','=','users.id')
    								 ->join('pacijents','potvrdas.id_pacijent','=','pacijents.id')	
    								 ->select('potvrdas.created_at','potvrdas.opis','users.name','potvrdas.id')
    								 ->orderBy('created_at','desc')
    								 ->where('potvrdas.id_pacijent', '=', $pacijent)
    								 ->paginate(10);

    	return view('include/prikaziPotvrde')->with('data',$data);
    }

    public function stampaPotvrde($id){
    	$data = DB::table('potvrdas')->where('potvrdas.id', '=', $id)
    								->get();

         foreach ($data as $da)
          {
            $opis= $da->opis;
            $vreme = $da->created_at;             
         }                        
            Session::put([
                    'opis'=>$opis,
                    'vreme'=>$vreme
                ]);

    	return view('include/prikaziJednuPotvrdu')->with('data',$data);
    }

    /**
     * Get view for a print   
     * 
     * @return view
     */
   public function printPotvrda(){

    return view('print/potvrdaPrint');
   }
    /**
     * Get view for a print   
     * 
     * @return view
     */
   public function printPrkaziJednuPotvrdu(){
    
    return view('print/spisakPotvrdaPrint');
   }
}
