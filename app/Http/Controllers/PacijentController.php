<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Pacijent;
use App\Karton;
use App\User;
use App\Alergije;
use App\Cenovnik;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Pagination\Presenter;
use Illuminate\Support\HtmlString;

class PacijentController extends Controller
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
    public function index(){
      $data = DB::table('cenovniks')->get();
      foreach ($data as $key => $value) {
          $pregled = $value->pregled;
          $kraj = $value->krajPregled;
      }
        Session::put([
            'pregled'=>$pregled,
            'krajPregled'=>$kraj,
          ]);

    	return view('pacijent');
    }

    /**
     * Get view 
     *
     * @return view
     */
    public function registarcijaPacijenta(){

        return view('registracijaPacijenta');        
    }
     /**
     * Store pacient 
     *
     * @return $data array
     */
    public function upisiPacijenta(Request $request){

        $this->validate($request,[
            'ime'=>'required',
            'prezime'=>'required',
            'imeroditelja'=>'required',
            'telefon'=>'numeric|min:6|required',
            'godiste'=>'numeric|min:4|required',
            'lbo'=>'required|min:8|unique:pacijents',
            'email'=>'required',
            'pol'=>'required'
        ]);
        $ime = $request['ime'];
        $prezime = $request['prezime'];
        $imeroditelja = $request['imeroditelja'];
        $telefon = $request['telefon'];
        $godiste = $request['godiste'];
        $lbo = $request['lbo'];
        $email = $request['email'];
        $pol = $request['pol'];

            $upis = new Pacijent();
            $upis->ime = $ime;
            $upis->prezime = $prezime;
            $upis->imeroditelja = $imeroditelja;
            $upis->brojtelefona = $telefon;
            $upis->pol = $pol;
            $upis->god_rodjenja = $godiste;
            $upis->lbo = $lbo;
            $upis->email = $email;
            $upis->save();
                 $message = "Uspesno ste registrovali Pacijenta";
                    $id_pacijenta = $upis->id;
                    $ime_pacijenta = $upis->ime;
                    $prezime_pacijenta = $upis->prezime;
                    $roditelj = $upis->imeroditelja;
                    $telefon = $upis->brojtelefona;
                    $godiste = $upis->god_rodjenja;
                    $lbo = $upis->lbo;
                    $email = $upis->email;
                    $id = $upis->id;
                       Session::put([
                        'id_pacijenta'=> $id_pacijenta,
                        'ime' => $ime_pacijenta,
                        'prezime'=> $prezime_pacijenta,
                        'roditelj' => $roditelj,
                        'message'=> $message,
                        'godiste' => $godiste,
                        'telefon' => $telefon,
                        'lbo' => $lbo,
                        'email'=>$email,
                        'pol' => $pol
                       ]);
                            return redirect()->route('updatePacijenta')->with('id',$id);
                    }

    /**
     * Get Pacient data 
     *
     * @return $data array
     */

       public function prikaziPacijenta(){

         $data = DB::table('kartons')->where('id_pacijent', '=' ,Session::get('id_pacijenta'))
                                     ->orderBy('created_at', 'desc')
                                     ->paginate(10);

        return view('include.sveOpacijentu', compact('data'));
       } 
    /**
     * Search Pacient $data
     *
     * @return $data array
     */
       public function search(Request $request){
        $search = $request->input('search');
 
        $members = DB::table('pacijents')->where('ime', 'like', '%' . $search . '%')
                                         ->orWhere('prezime', 'like', '%' . $search . '%')      
                                         ->paginate(50);
        return view('result')->with(['members'=> $members]);
    }
      /**
     * Show Pacient $data
     *
     * @return $data array
     */
        public function viewmember($id){
 
        $member = Pacijent::find($id);

        $id_pacijenta = $member->id;
        $ime_pacijenta = $member->ime;
        $prezime_pacijenta = $member->prezime;
        $roditelj = $member->imeroditelja;
        $god_rodjenja = $member->god_rodjenja;

          Session::put([
            'id_pacijenta'=> $id_pacijenta,
            'ime' => $ime_pacijenta,
            'prezime'=> $prezime_pacijenta,
            'roditelj' => $roditelj,
            'godiste' =>$god_rodjenja
           ]);
    
        return view('vrstePregleda')->with(['member'=> $member,
                                     'ime'=> $ime_pacijenta,
                                     'prezime'=> $prezime_pacijenta,
                                     'imeroditelja'=> $roditelj,
                                     'god_rodjenja'=> $god_rodjenja,
                                     'id_pacijenta'=>$id_pacijenta 
                                    ]);
         
    }

    public function terapije(){

        $id_pacijenta = Session::get('id_pacijenta');
        $id_doktor = Auth::user()->id;
        $data  = DB::table('kartons')->join('users', 'kartons.id_doktor','=', 'users.id')
                                     ->select('kartons.lek','kartons.lecenje','kartons.created_at','kartons.id','users.name')->orderBy('created_at', 'desc')
                                     ->where('id_pacijent', '=' ,$id_pacijenta)
                                     ->paginate(10);
        return view('terapije')->with('data', $data);
    }
   /**
     * Show Therapy
     *
     * @return $data array
     */
    public function prikaziTerapiju($id){

        $data = DB::table('kartons')->where('id', '=', $id)->get();
        foreach($data as $da)
        {
          $lecenje = $da->lecenje;
          $lek = $da->lek;
          $vreme = $da->created_at;
        }

        Session::put([
            'lecenje'=>$lecenje,
            'lek'=>$lek,
            'vreme'=>$vreme
        ]);

        return view('include.prikaziTerapiju')->with('data', $data);
    }
      /**
     * Store daat in Alergias Table DB
     *
     * @return void
     */
    public function alergija(Request $request){
         $this->validate($request,[
            'alergija'=>'required'
         ]);

        $id_pacijenta = Session::get('id_pacijenta');
        $alergija = $request['alergija'];

        $upis = new Alergije();
        $upis->napomene = $alergija;
        $upis->id_pacijent = $id_pacijenta;
        $upis->save();

       $alert = $upis->napomene;
       $test = Session::put(['test'=>$alert]);
        return redirect()->back();

    }
   /**
     * Get important Alergies informations,stored in sessions
     *
     * @return $data array
     */
    public function napomene()
    {
        $id_pacijenta = Session::get('id_pacijenta');
        $data = DB::table('alergijes')->select('napomene')
                                      ->where('id_pacijent', '=', $id_pacijenta)->get();
            $napomena = count($data);
            $poruka ="";                     
        return view('include.alergije')->with([
            'napomena'=>$napomena,
            'poruka' => $poruka,
             'data' => $data
        ]); 
      }
    /**
     * Get pacient Id from view
     *
     * @return $data array
     */
      public function promenaPodatakaPacijenta($id){

        $data = Pacijent::find($id);
           return view('promenaPodatakaPacijenta')->with('data',$data);

      }
       /**
     * Update pacient informations
     *
     * @return $data array
     */
      public function upisiPromenuPacijenta(Request $request,$id){
         $this->validate($request,[
            'ime'=>'required',
            'prezime'=>'required',
            'imeroditelja'=>'required',
            'telefon'=>'numeric|min:6|required',
            'godiste'=>'numeric|min:4|required',
            'email'=>'required',
            'lbo'=>'required|min:8',
            'pol'=>'required'
        ]);

        $ime = $request['ime'];
        $prezime = $request['prezime'];
        $imeroditelja = $request['imeroditelja'];
        $telefon = $request['telefon'];
        $godiste = $request['godiste'];
        $lbo = $request['lbo'];
        $email = $request['email'];
        $pol = $request['pol'];

        $data = Pacijent::find($id);
         $data->update(array(
                      'ime'=>$ime,
                      'prezime'=>$prezime,
                      'imeroditelja'=>$imeroditelja,
                      'brojtelefona'=>$telefon,
                      'god_rodjenja'=>$godiste,
                      'lbo'=>$lbo,
                      'email'=>$email,
                      'pol'=>$pol 
            ));
     
     return redirect()->back()->withSuccess('Uspešno ste promenili podatke Pacijenta');

}
   /**
     * Get view
     *
     * @return void
     */
  public function brisanjePacijenta(){

    return view('doktor/brisanjePacijenta');
  }
   /**
     * Search for delete pacient
     *
     * @return $data array
     */
  public function search2(Request $request){
   $search = $request->input('search');

   
  $data=DB::table('pacijents')->where('ime','like','%' .$search . '%')
                              ->orWhere('prezime', 'like', '%' . $search . '%')
                              ->orWhere('imeroditelja', 'like', '%' . $search . '%')  
                                        ->paginate(50);                                  
  return view('doktor/brisanjeJednogPacijenta')->with('data',$data);
  }
   /**
     * Delete One Pacient
     *
     * @return $data array
     */
  public function brisanjeJednogPacijenta($id){

    $brisanje = Pacijent::find($id);
    $brisanje->delete();
    return redirect()->back()->withSuccess('Uspešno ste Obrisali Pacijenta');

  }
     /**
     * Get pacient Id from view
     *
     * @return $data array
     */
  public function promenaPodataka($id_pacijenta){
  $data = Pacijent::find($id_pacijenta);
  return view('promenaPodatakaRegister')->with('data',$data);
  }
   /**
     * GUpdate Pacients Informations
     *
     * @return message
     */
  public function unesiNovePodatkeRegister(Request $request,$id){

  $this->validate($request,[
            'ime'=>'required',
            'prezime'=>'required',
            'imeroditelja'=>'required',
            'telefon'=>'numeric|min:6|required',
            'godiste'=>'numeric|min:4|required',
            'email'=>'required',
            'lbo'=>'required|min:8',
            'pol'=>'required'
        ]);

        $ime = $request['ime'];
        $prezime = $request['prezime'];
        $imeroditelja = $request['imeroditelja'];
        $telefon = $request['telefon'];
        $godiste = $request['godiste'];
        $lbo = $request['lbo'];
        $email = $request['email'];
        $pol = $request['pol'];

        $data = Pacijent::find($id);
         $data->update(array(
                      'ime'=>$ime,
                      'prezime'=>$prezime,
                      'imeroditelja'=>$imeroditelja,
                      'brojtelefona'=>$telefon,
                      'god_rodjenja'=>$godiste,
                      'lbo'=>$lbo,
                      'email'=>$email,
                      'pol'=>$pol 
            ));
     
     return redirect()->back()->withSuccess('Uspešno ste promenili podatke Pacijenta');
   

}
   /**
     * Get view for a print
     *
     * @return view
     */
public function istorijaLecenjaPrint(){

  return view('print/istorijaLecenjaPrint');
}

}
