<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Pacijent;
use App\Cenovnik;
use App\Http\Requests;
use App\Sistematski;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SistematskiController extends Controller
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

    public function sistematski(){
    	$data = DB::table('cenovniks')->get();
    	
    	foreach ($data as $key => $value) {
    		$sistematski = $value->sistematski;
    	}
    		Session::put([

    				'sistematski'=>$sistematski
    		]);

    	return view('sistematski/sistematski');
    }
    /**
     * Store data in DB.
     *
     * @return message
     */
    public function sistematskiUpis(Request $request){

        $this->validate($request,[
            'godina'=>'required',
            'mesec'=>'required',
            'tezina'=>'required',
            'duzina'=>'required',
            'obim'=>'required',
            'ishrana'=>'required',
            'vakcina'=>'required',
            'zubi'=>'required|numeric',
            'krvnaSlika'=>'required',
            'kuk'=>'required',
            'opis'=>'required'
    ]);

        $id_doktor = Auth::user()->id;
        $id_pacijenta = Session::get('id_pacijenta');
        $godina = $request->godina;
        $mesec = $request->mesec;
        $tezina = $request->tezina;
        $duzina = $request->duzina;
        $obim = $request->obim;
        $ishrana = $request->ishrana;   
        $vakcina = $request->vakcina;
        $zubi = $request->zubi;
        $krvnaSlika = $request->krvnaSlika;
        $krv = $request->krv;
        $kuk = $request->kuk;
        $kukovi = $request->kukovi;
        $opis = $request->opis;

        $upis= new Sistematski();
        $upis->godina = $godina;
        $upis->mesec = $mesec;
        $upis->tezina = $tezina;
        $upis->duzina =$duzina;
        $upis->obim = $obim;
        $upis->ishrana = $ishrana;
        $upis->vakcina = $vakcina;
        $upis->zubi = $zubi;
        $upis->krv = $krvnaSlika;
        $upis->krv = $krv; // sa textarea
        $upis->kukovi = $kuk;
        $upis->kukovi = $kukovi; // sa textarea
        $upis->zakljucak = $opis;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();
        Session::put([
            'godina'=>$godina,
            'mesec'=>$mesec,
            'tezina'=>$tezina,
            'duzina'=>$duzina,
            'obim'=>$obim,
            'ishrana'=>$ishrana,
            'vakcina'=>$vakcina,
            'zubi'=>$zubi,
            'krv1'=>$krvnaSlika,
            'krv2'=>$krv,
            'kukovi1'=>$kuk,
            'kukovi2'=>$kukovi,
            'zakljucak'=>$opis

        ]);

         session()->flash('tezinaF',$tezina); 
         session()->flash('duzinaF',$duzina);
         session()->flash('obimF',$obim);
         session()->flash('vakcinaF',$vakcina);
         session()->flash('zubiF',$zubi);
         session()->flash('krv1F',$krvnaSlika);
         session()->flash('krv2F',$krv);
         session()->flash('kukovi1F',$kuk);
         session()->flash('kukovi2F',$kukovi);
         session()->flash('zakljucakF',$opis);

        return redirect()->back()->withSuccess('Uspesno ste upisali podatke Pregleda');

    }

    /**
     * Show data sis review.
     *
     * @return $data array
     */
   public function prikaziSistematski(){
    $id_doktor = Auth::user()->id;
    $id_pacijenta = Session::get('id_pacijenta');

    $data = DB::table('sistematskis')
                                    ->join('users','sistematskis.id_doktor','=','users.id')
                                    ->join('pacijents','sistematskis.id_pacijent','=','pacijents.id')
                                    ->select('users.name','sistematskis.id','sistematskis.godina',
                                          'sistematskis.mesec','sistematskis.created_at','pacijents.ime')
                                    ->where('sistematskis.id_pacijent','=', $id_pacijenta )
                                    ->orderBy('sistematskis.created_at', 'desc')
                                    ->get();                        

    return view('sistematski/prikaziSistematski')->with('data',$data);
   } 
   /**
     * Show one sis review.
     *
     * @return $data array
     */
   public function prikaziJedanSistematski($id){

        $podatak = Sistematski::find($id);
        $data = DB::table('sistematskis')->where('id','=',$id)
                                         ->get();                            
        
         foreach ($data as $da) {
        
                $godina = $da->godina;
                $mesec = $da->mesec;
                $tezina = $da->tezina;
                $duzina = $da->duzina;
                $obim = $da->obim;
                $ishrana = $da->ishrana;
                $ishrana = $da->vakcina;
                $zubi= $da->zubi;
                $krv = $da->krv; 
                $kuk = $da->kukovi;
                $vakcina = $da->vakcina;
                $vreme = $da->created_at;
                $opis = $da->zakljucak; 
         }                                

        
        
        Session::put([
            'godina'=>$godina,
            'mesec'=>$mesec,
            'tezina'=>$tezina,
            'duzina'=>$duzina,
            'obim'=>$obim,
            'ishrana'=>$ishrana,
            'vakcina'=>$vakcina,
            'zubi'=>$zubi,
            'krv'=>$krv,
            'kukovi'=>$kuk,
            'zakljucak'=>$opis,
            'vreme'=>$vreme   
        ]);                            

    return view('sistematski/prikaziJedanSistematski')->with('data',$data);
   }
   /**
     * Get view for a print   
     * 
     * @return view
     */
   public function printSistematski(){
        return view('print/sistematskiPrint');
   }
   /**
     * Get view for a print   
     * 
     * @return view
     */
   public function printJedanSistematski(){
    return view('print/sistematskiPrintjedna');
   }

}
