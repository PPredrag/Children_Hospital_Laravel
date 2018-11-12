<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Vakcina;
use App\User;
use App\Pacijent;
use DB;
use App\Cenovnik;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class VakcinaController extends Controller
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
     * Check if Vakcina exists
     *
     * @return $data array
     */
   public function daLiImaVakcinu(){
    $id_pacijenta = Session::get('id_pacijenta');
    $id_doktor = Auth::user()->id;
      $data = DB::table('vakcinas')->where('id_pacijent','=',$id_pacijenta)
                  ->get();

       $cena = DB::table('cenovniks')->get();
          foreach ($cena as $key => $value) {
                       $staraVakcina = $value->vakcina;
                     } 
           Session::put([
                'vakcina'=> $staraVakcina
           ]);                    
       $napomena = count($data);
       if($napomena > 0){
         return view('vakcina/vakcina')->with([
                      'data' => $data,
                      'napomena' => $napomena
                    ]);
      }else{              
           return view('vakcina/regVakcina')->with([
                      'data' => $data,
                      'napomena' => $napomena
                    ]);   
     }            
   }
    /**
     *Store pacient data in tabel Vakcinas
     *
     * @return $data array
     */
   public function upisiPacijentaVakcina(){
      $id_pacijenta = Session::get('id_pacijenta');
      $id_doktor = Auth::user()->id;
        $upis = new Vakcina();
          $upis->id_pacijent = $id_pacijenta;
          $upis->id_doktor = $id_doktor;
          $upis->save();
             return redirect()->back();

   } 
   /**
     * Get tabele of Vakcinas 
     *
     * @return $data array
     */
   public function vakcina(){
    $id_pacijenta = Session::get('id_pacijenta');
    $id_doktor = Auth::user()->id;
    	$data = DB::table('vakcinas')->where('id_pacijent','=',$id_pacijenta)
   								->get();
       	$napomena = count($data);		
        return view('vakcina/vakcina')->with([
   										'data' => $data,
   										'napomena' => $napomena
   									]);							
   }
   /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function hbdruga(Request $request, $id){
      $vrednost = 1;
      $vakcina = Vakcina::find($id); 
         if($vakcina->hbdruga == 1){
             return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO HBDRUGU VAKCINU , MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
    else{
           $vakcina->update(array('hbdruga' => $vrednost));
         return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA HBDRUGA VAKCINA');
    }
   }
   /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function bcg(Request $request, $id){
        $vrednost = 1;
        $vakcina = Vakcina::find($id);
           if($vakcina->bcg == 1){
             return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO BCG VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
               }
           else{
            $vakcina->update(array('bcg' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA BCG VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function hbprva(Request $request, $id){
        $vrednost = 1;
        $vakcina = Vakcina::find($id);
        if($vakcina->hbprva == 1){
         return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO HBPRVU VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('hbprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA HBPRVA VAKCINA');
             }
    }
    /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function dtpprva(Request $request, $id){
        $vrednost = 1;
        $vakcina = Vakcina::find($id);
           if($vakcina->dtpprva == 1){
             return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO  DTPPRVA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('dtpprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA DTPPRVA VAKCINA');
    }
  }
    /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
    public function opvprva(Request $request, $id){
        $vrednost = 1;
         $vakcina = Vakcina::find($id);
           if($vakcina->opvprva == 1){
            return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO OPVPRVA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('opvprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA OPVPRVA VAKCINA');
    }
  }
    /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function hibprva(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->hibprva == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO HIBPRVA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('hibprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA HIBPRVA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function dtpdruga(Request $request, $id){
        $vrednost = 1;
        $vakcina = Vakcina::find($id);
           if($vakcina->dtpdruga == 1){
             return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO  DTPDRUGA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('dtpdruga' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA DTPDRUGU VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvdruga(Request $request, $id){
        $vrednost = 1;
         $vakcina = Vakcina::find($id);
           if($vakcina->opvdruga == 1){
            return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO OPVDRUGA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('opvdruga' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA OPVDRUGA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function hibdruga(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->hibdruga == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO HIBDRUGA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('hibdruga' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA HIBDRUGA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
     public function hbtreca(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->hbtreca == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO HBTRECA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('hbtreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA HBTRECA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function dtptreca(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtptreca == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO DTPTRECA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('dtptreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA DTPTRECA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvtreca(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvtreca == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO OPVTRECA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('opvtreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA OPVTRECA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function hibtreca(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->hibtreca == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO HIBTRECA VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('hibtreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA HIBTRECA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
    public function mmrb(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->mmrb == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO MMR VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('mmrb' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA MMR VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
    public function dtpp1(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtpp1 == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO DTP P1 VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('dtpp1' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA DTP P1 VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvp1(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvp1 == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO OPV P1 VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('opvp1' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA OPV P1 VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvp2(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvp2 == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO OPV P2 VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('opvp2' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA OPV P2 VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function mmrp(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->mmrp == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO MMR REVAKCINU VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('mmrp' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA MMR REVAKCINA VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function dtp2(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtp2 == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO DT P2 VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('dtp2' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA DT P2 VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function hbtridoze(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->hbtridoze == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO HB TRI DOZE VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('hbtridoze' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA HB TRI DOZE VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvp3(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvp3 == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO OPV P3  VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('opvp3' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA OPV P3 VAKCINA');
    }
  }
  /**
     * Store specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function dtp3(Request $request, $id){
        $vrednost = 1;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtp3 == 1){
           return redirect()->back()->withSuccess('PACIJENT JE VEĆ PRIMIO DT P3 VAKCINU, MOŽETE PROMENITI NA DUGME "Izmeni Evidentirane Vakcine"');
          }
        else{
         $vakcina->update(array('dtp3' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA DT P3 VAKCINA');
    }
  }
  public function spisakPrimljenihVakcina(){
    $pacijent = Session::get('id_pacijenta');
    $data = DB::table('vakcinas')->where('id_pacijent','=',$pacijent)->get();
    return view('vakcina/spisakVakcina')->with('data',$data);
  }

     /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   
      public function izmenaVakcine(){
          $id_pacijenta = Session::get('id_pacijenta');
    $id_doktor = Auth::user()->id;
      $data = DB::table('vakcinas')->where('id_pacijent','=',$id_pacijenta)
                  ->get();
   return view('vakcina/izmenaVakcine')->with('data', $data);       

      }
       /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
      public function bcg0(Request $request, $id){
        $vrednost = 0;
        $vakcina = Vakcina::find($id);
          if($vakcina->bcg == 0){
            return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
            else{
            $vakcina->update(array('bcg' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA BCG VAKCINU ');
    }
  }

   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function hbprva0(Request $request, $id){
        $vrednost = 0;
        $vakcina = Vakcina::find($id);
        if($vakcina->hbprva == 0){
         return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('hbprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA HBPRVA VAKCINA');
             }
    }
     /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
      public function hbdruga0(Request $request, $id){
      $vrednost = 0;
      $vakcina = Vakcina::find($id); 
         if($vakcina->hbdruga == 0 ){
             return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
    else{
           $vakcina->update(array('hbdruga' => $vrednost));
         return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA HBDRUGA VAKCINA');
    }
   }
    /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
      public function dtpprva0(Request $request, $id){
        $vrednost = 0;
        $vakcina = Vakcina::find($id);
           if($vakcina->dtpprva == 0){
             return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('dtpprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA  DTPPRVA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
 public function opvprva0(Request $request, $id){
        $vrednost = 0;
         $vakcina = Vakcina::find($id);
           if($vakcina->opvprva == 0){
            return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('opvprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA  IZMENA  OPVPRVA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
public function hibprva0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->hibprva == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('hibprva' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA  HIBPRVA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
public function dtpdruga0(Request $request, $id){
        $vrednost = 0;
        $vakcina = Vakcina::find($id);
           if($vakcina->dtpdruga == 0){
             return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('dtpdruga' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA DTPDRUGU VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
public function opvdruga0(Request $request, $id){
        $vrednost = 0;
         $vakcina = Vakcina::find($id);
           if($vakcina->opvdruga == 0){
            return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('opvdruga' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA OPVDRUGA VAKCINA');
    }
  }

 /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
public function hibdruga0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->hibdruga == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('hibdruga' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA HIBDRUGA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
public function hbtreca0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->hbtreca == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('hbtreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA HBTRECA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function dtptreca0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtptreca == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('dtptreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA DTPTRECA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvtreca0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvtreca == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('opvtreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA OPVTRECA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function hibtreca0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->hibtreca == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('hibtreca' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA HIBTRECA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
    public function mmrb0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->mmrb == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('mmrb' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA MMR VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
    public function dtpp10(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtpp1 == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('dtpp1' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA DTP P1 VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvp10(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvp1 == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('opvp1' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA OPV P1 VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvp20(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvp2 == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('opvp2' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA OPV P2 VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
   public function mmrp0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->mmrp == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('mmrp' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA MMR REVAKCINA VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function dtp20(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtp2 == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('dtp2' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA  DT P2 VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function hbtridoze0(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->hbtridoze == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('hbtridoze' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA HB TRI DOZE VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function opvp30(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->opvp3 == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('opvp3' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA  IZMENA OPV P3 VAKCINA');
    }
  }
   /**
     * Update specific Vakcinas in table Vakcinas 
     *
     * @return message
     */
  public function dtp30(Request $request, $id){
        $vrednost = 0;
          $vakcina = Vakcina::find($id);
           if($vakcina->dtp3 == 0){
           return redirect()->back()->withSuccess('DA BI STE PROMENILI STATUS MOLIM VAS DA ODETE U "Novi Pregled"');
          }
        else{
         $vakcina->update(array('dtp3' => $vrednost));
            return redirect()->back()->withSuccess('ZA PACIJENTA JE UPRAVO EVIDENTIRANA IZMENA DT P3 VAKCINA');
    }
  }


}
