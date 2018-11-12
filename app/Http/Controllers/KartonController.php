<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Karton;
use DB;


class KartonController extends Controller
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
     * Store data in Data Base from Pregled
     *
     * @return message
     */
    public function store(Request $request)
    {
           $this->validate($request,[
            'simptomi'=> 'required',
            'dijagnoza'=>'required',
            'lecenje'=>'required',
            'lek'=>'required'
        ]);

        $id_doktor = Auth::user()->id;
        $id_pacijenta = Session::get('id_pacijenta');
        $simptomi = $request['simptomi'];
        $dijagnoza = $request['dijagnoza'];
        $lecenje = $request['lecenje'];
        $lek = $request['lek'];

        $upis = new Karton();
        $upis->simptomi= $simptomi;
        $upis->dijagnoza = $dijagnoza;
        $upis->lecenje = $lecenje;
        $upis->lek = $lek;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        $simptomi = $upis->simptomi;
        $dijagnoza = $upis->dijagnoza;
        $lecenje = $upis->lecenje;
        $lek = $upis->lek;

        Session::put([
            'simptomi'=>$simptomi,
            'dijagnoza'=>$dijagnoza,
            'lecenje'=>$lecenje,
            'lek'=>$lek,
            'vreme'=>$upis->created_at   
        ]);
        session()->flash('simptomiF',$simptomi);
        session()->flash('dijagnozaF',$dijagnoza);
        session()->flash('lecenjeF',$lecenje);
        session()->flash('lekF',$lek);


        return redirect()->back()->withSuccess('Uspešno ste registrovali Pregled i Dijagnozu');

    }
    /**
     * Store data in Data Base from Pregled
     *
     * @return $data array
     */
    public function korisceniLekovi(Request $request){
        $id_pacijent = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;

        $data = DB::table('kartons')
                                    ->join('users','kartons.id_doktor', '=' , 'users.id')
                                    ->join('pacijents','kartons.id_pacijent','=', 'pacijents.id')
                                    ->select('kartons.lek','kartons.id','kartons.dijagnoza','kartons.created_at', 'users.name')
                                    ->where('id_pacijent', '=', $id_pacijent)
                                    ->orderBy('kartons.created_at', 'desc')
                                    ->paginate(10);
        return view('include.korisceniLekovi', compact('data'));
    }
    /**
     * Get uses medical per client
     *
     * @return $data array
     */
    public function prikaziLekove($id){
        $id_pacijenta= Session::get('id_pacijenta');
            $data = DB::table('kartons')->where('id', '=', $id)
                                    ->where('id_pacijent', '=', $id_pacijenta)
                                    ->get();
          foreach ($data as $da) 
          {
            $dijagnoza = $da->dijagnoza;
            $lek = $da->lek;
            $vreme = $da->created_at;
          }                          

         Session::put([
            'dijagnoza'=>$dijagnoza,
            'lek'=>$lek,
            'vreme'=>$vreme
         ]); 
                                    
        return view('include.prikazLeka', compact('data'));
    }
    /**
     * Show last treatment
     *
     * @return $data array
     */

     public function prikazNastavakLecenja($id){
         $id_pacijenta= Session::get('id_pacijenta');

        $data = DB::table('kartons')->where('id', '=', $id)
                                    ->where('id_pacijent', '=', $id_pacijenta)
                                    ->get();

        return view('nastavakLecenja', compact('data'));

    }
    /**
     * Update Last tretment
     *
     * @return $data array
     */
     public function azurirajNastavakLecenja(Request $request,$id){
        $simptomi = $request['simptomi'];
        $dijagnoza = $request['dijagnoza'];
        $lecenje = $request['lecenje'];
        $lek = $request['lek'];
        $pregled = Karton::find($id);
        $pregled->update(array('simptomi' => $simptomi,
                                'dijagnoza'=>$dijagnoza,
                                'lecenje'=>$lecenje,
                                'lek'=>$lek
                        ));
        $simptomi = $pregled->simptomi;
        $dijagnoza = $pregled->dijagnoza;
        $lecenje = $pregled->lecenje;
        $lek = $pregled->lek;
        $vreme = $pregled->created_at;
        Session::put([
                        'simptomi'=>$simptomi,
                        'dijagnoza'=>$dijagnoza,
                        'lecenje'=>$lecenje,
                        'lek'=>$lek,
                        'vreme'=>$vreme
                    ]);

        return redirect()->back()->withSuccess('USPEŠNO SE UNELI NASTAVAK LEČENJA');

      }
    /**
     * To get data from Last visit
     *
     * @return $data array,$podatak number
     */
      public function poslednjiDolazak(){
        $id_pacijenta= Session::get('id_pacijenta');
        $data = Karton::latest()->where('id_pacijent','=',$id_pacijenta)->first(); // da se nadje zadnji upisan podatak u bazu, odredjenog klijenta zasniva se na timestamp
        $podatak = count($data);
        if($podatak !=0){
        $simptomi = $data->simptomi;
        $dijagnoza = $data->dijagnoza;
        $lecenje = $data->lecenje;
        $lek = $data->lek;
        $vreme = $data->created_at;
         Session::put([
                        'simptomi'=>$simptomi,
                        'dijagnoza'=>$dijagnoza,
                        'lecenje'=>$lecenje,
                        'lek'=>$lek,
                        'vreme'=>$vreme
                    ]);

        return view('include/poslednjiDolazak')->with(['data'=>$data,'podatak'=>$podatak]);
        }
        else{
            return redirect()->back()->withSuccess('Pacijent nema predhodne dolaske');;
        }
      }
    /**
    * Show one diagnosis 
    *
    * @return $data array
    */
    public function prikaziJednuDijagnozu($id){

        $id_pacijenta= Session::get('id_pacijenta');
        $data = DB::table('kartons')->where('id', '=', $id)
                                    ->where('id_pacijent', '=', $id_pacijenta)
                                    ->get();
          foreach ($data as $da) // za print pojedinacnog pregleda
           {
            $simptomi = $da->simptomi;  
            $dijagnoza = $da->dijagnoza;
            $lecenje = $da->lecenje;
            $lek = $da->lek;
            $vreme = $da->created_at; 
            } 
           Session::put([
                        'simptomi'=>$simptomi,
                        'dijagnoza'=>$dijagnoza,
                        'lecenje'=>$lecenje,
                        'lek'=>$lek,
                        'vreme'=>$vreme
                    ]);                                      
                           

        return view('prikaziPacijenta', compact('data'));
    }
    /**
     * Update data for tretment 
     *
     * @return $data array
     */
    public function azuriranjaLecennja(Request $request){

        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $simptomi = $request['simptomi'];
        $dijagnoza = $request['dijagnoza'];
        $lecenje = $request['lecenje'];
        $lek = $request['lek'];

        $upis = new Karton();
        $upis->simptomi= $simptomi;
        $upis->dijagnoza = $dijagnoza;
        $upis->lecenje = $lecenje;
        $upis->lek = $lek;
        $upis->id_pacijent = $id_pacijenta;
        $upis->id_doktor = $id_doktor;
        $upis->save();

        return view('istorijaPacijenta');


    }
    /**
     * Get list od diagnosis
     *
     * @return $data array
     */
    public function spisakDijagnoza(){
        $pacijent = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;

        $data = DB::table('kartons')->join('users','kartons.id_doktor','=','users.id')
                                    ->select('kartons.dijagnoza','kartons.id','users.name','kartons.created_at')
                                    ->where('id_pacijent', '=', $pacijent)
                                    ->paginate(10);

        return view('include/spisakDijagnoza')->with('data',$data);
    }


    /**
     * Get One diagnosis
     *
     * @return $data array
     */
    public function jednaDijagnoza($id){
        $podatak = Karton::find($id);
        $data = DB::table('kartons')->where('id','=',$podatak->id)->get();
        foreach ($data as $da)
          {
            $dijagnoza = $da->dijagnoza;
            $vreme = $da->created_at;   
          }                           
          Session::put([
                'dijagnoza'=>$dijagnoza,
                'vreme'=>$vreme
          ]);

        return view('include/prikaziJednuDijagnozu')->with('data',$data);
    }
    /**
     * Get view
     *
     * @return void
     */
    public function printPregled(){
        return view('print/pregledPrint');
    }
    /**
     * Get view
     *
     * @return void
     */
    public function printNastavak(){
         return view('print/nastavakLecenjaPrint');
    }
    /**
     * Get view
     *
     * @return void
     */
    public function printJednoLecenje(){
         return view('print/istorijaDolazakaPrint');
    }
    /**
     * Get view
     *
     * @return void
     */
    public function printPrikazLeka(){
        return view('print/prikazLekaPrint');
    }
    /**
     * Get view
     *
     * @return void
     */
    public function printPrkaziJednuDijagnozu(){
        return view('print/prikaziJednuDijagnozuPrint');
    }
    /**
     * Get view
     *
     * @return void
     */
    public function predhodniDolazakPrint(){
        return view('print.predhodniDolazakPrint');
    }
}
