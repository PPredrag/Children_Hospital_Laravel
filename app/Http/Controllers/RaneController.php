<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Rane;
use App\User;
use App\Pacijent;
use App\Cenovnik;
use Illuminate\Support\Facades\Auth;
use DB;

class RaneController extends Controller
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
    public function rane(){

        $data = DB::table('cenovniks')->get();

        foreach ($data as $key => $value) {
            $rane = $value->rane;
        }
            Session::put([
                    'rane'=>$rane
            ]);

    	return view('rane/rane');
    }
    /**
     * Store data in DB 
     *
     * @return message,string
     */
    public function upisiPrevijanje(Request $request){

        $this->validate($request,[
            'povreda'=>'required',
            'telo'=>'required',
            'terapija'=>'required'
        ]);

    	$id_doktor = Auth::user()->id;
        $id_pacijenta = Session::get('id_pacijenta');
        $telo = $request['telo'];
        $povreda = $request['povreda'];
        $terapija = $request['terapija'];


        $upis = new Rane();
        $upis->deoTela = $telo;
        $upis->povreda = $povreda;
        $upis->terapija = $terapija;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;

        $upis->save();


        Session::put([
                'deoTela' => $upis->deoTela,
                'opisPovrede' => $upis->povreda,
                'terapija' => $upis->terapija,
                 'vreme'=>$upis->created_at   
            ]);
        session()->flash('deoTelaF',$telo);
        session()->flash('opisPovredeF',$povreda);
        session()->flash('terapijaF',$terapija);

        return redirect()->back()->withSuccess('ZA PACIJENTA JE REGISTROVANO PREVIJANJE');

    }
    /**
     * Get all data for rewinding
     *
     * @return $data array
     */
    public function spisakPrevijanja(){
    	$doktor = Auth::user()->id;
        $pacijent = Session::get('id_pacijenta');

        $data = DB::table('ranes')->join('users','ranes.id_doktor','=','users.id')
        						  ->join('pacijents','ranes.id_pacijent','=','pacijents.id')
        						  ->select('ranes.deoTela','ranes.povreda','ranes.terapija','ranes.id','users.name','ranes.created_at')	
        						  ->orderBy('created_at','desc')
        						  ->where('ranes.id_pacijent', '=', $pacijent)
    							  ->paginate(10);	
    	return view('rane/raneSpisak')->with('data',$data);
    }
    /**
     * Get one wound
     *
     * @return $data array
     */
    public function jednaRana($id){
    	$podatak = Rane::find($id);
    	$data = DB::table('ranes')->where('id','=',$podatak->id)
    								->get();
         foreach ($data as $da)
          {
             $deoTela = $da->deoTela;
             $opisPovrede = $da->povreda;
             $terapija = $da->terapija; 
             $vreme = $da->created_at;                          
          }                           
    		Session::put([
                    'deoTela'=>$deoTela,
                    'opisPovrede'=>$opisPovrede,
                    'terapija'=>$terapija,
                    'vreme'=>$vreme

            ]);					
    	return view('rane/jednaRana')->with('data',$data);

    }
     /**
     * Get view for a print   
     * 
     * @return view
     */
    public function printRane(){
        return view('print/ranePrint');
    }
     /**
     * Get view for a print   
     * 
     * @return view
     */
    public function printSpisakRana(){
        return view('print/printSpisakRana');
    }
}
