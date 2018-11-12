<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cene;
use App\Http\Requests;
use App\Pacijent;
use App\Karton;
use App\User;
use App\Alergije;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class CeneController extends Controller
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
    * Price for Fakcina to be stored in DB
    */
    public function vakcinaCene(Request $request){
    	$id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $cenaVakcine = $request['vakcina'];

        $upis = new Cene();
        $upis->vakcina = $cenaVakcine;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return redirect()->back()->withSuccess('Uspešno ste napaltili Vakcinu');

    }

    public function pregledCene(Request $request){
        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $cenaVakcine = $request['pregled'];

        $upis = new Cene();
        $upis->vakcina = $cenaVakcine;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return redirect()->back()->withSuccess('Uspešno ste napaltili Vakcinu');

    }
     /**
    * Price for Pregled to be stored in DB
    */
    public function napaltaPregleda(Request $request){
        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $cenaPregleda = $request['pregled'];

        $upis = new Cene();
        $upis->pregled = $cenaPregleda;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return redirect()->back()->withSuccess('Uspešno ste napaltili Pregled');


    }
    /**
    * Price for Izdavanje Potvrde to be stored in DB
    */
    public function napaltaPotvrde(Request $request){
        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $cenaPregleda = $request['potvrda'];

        $upis = new Cene();
        $upis->potvrda = $cenaPregleda;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return redirect()->back()->withSuccess('Uspešno ste napaltili Izdavanje Potvrde');


    }/**
    * Price for Izdavanje Previjanje to be stored in DB
    */
    public function napaltaRane(Request $request){
        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $cenaRane = $request['rana'];

        $upis = new Cene();
        $upis->rane = $cenaRane;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return redirect()->back()->withSuccess('Uspešno ste napaltili Previjanje rane');


    }
    /**
    * Price for Sistematski to be stored in DB
    */
    public function naplanaSis(Request $request){
        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $cenaSis = $request['sistematski'];

        $upis = new Cene();
        $upis->sistematski = $cenaSis;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return redirect()->back()->withSuccess('Uspešno ste napaltili Sestematski Pregled');


    }
    /**
    * Price for Kraj Lecenja to be stored in DB
    */
    public function zavrsiPregled(Request $request){
        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $cenaKraj = $request['kraj'];

        $upis = new Cene();
        $upis->krajPregled = $cenaKraj;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return redirect()->back()->withSuccess('Uspešno ste napaltili Kraj Lečenja');

    }
    /**
    * To be deleted Income 
    */
    public function brisanjeZarade(){
         $cena = new Cene();
         $data = $cena->brisanje();
                
        return view('doktor/brisanjeZarade')->with([
                                                'data'=>$data
                                            ]);
    }
    /**
    * To be deleted One Income 
    */
    public function obrisiJednuZaradu($id){
        $brisanje = Cene::find($id);
        $brisanje->delete();
        
        return redirect()->back()->withSuccess('Uspešno ste obrisalu upisanu Zaradu');
    }


}
