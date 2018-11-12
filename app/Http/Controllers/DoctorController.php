<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cene;
use App\User;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DoctorController extends Controller
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
	*Get Income for Period of time
	* 
	* @return data in array
    */
    public function zaradaPeriod(Request $request){
    	$doktor = Auth::user()->id; 
        $vrednost = $request->vreme;
		$data = DB::table('cenes')->where('id_doktor','=',$doktor)
		->where('created_at','>',Carbon::now()->subDays($vrednost))->get();
		$brojPregleda = count($data);
		$laza = Carbon::now();
		

		$pre = 0;
		$krajPreg = 0;
		$pot = 0;
		$vkaci = 0;
		$ra = 0;
		$sis = 0;

		foreach ($data as $key => $da) {
			$pregled = $da->pregled;
			$pre += $pregled;

			$kraj = $da->krajPregled;
			$krajPreg += $kraj;

			$potvrda = $da->potvrda;
			$pot += $potvrda;

			$vakcina = $da->vakcina;
			$vkaci += $vakcina;

			$rane = $da->rane;
			$ra += $rane;

			$sistematski = $da->sistematski;
			$sis += $sistematski;
			
		}
		$ukupno = $pre + $krajPreg + $pot + $vkaci + $ra + $sis;
		
    	return view('doktor/zaradaDoktora')->with([ 'data'=> $data,
    												'pre'=> $pre,	
    												'krajPreg'=> $krajPreg,
    												'pot'=> $pot,
    												'vkaci'=> $vkaci,
    												'ra'=> $ra,
    												'sis'=> $sis,
    												'ukupno'=> $ukupno,
    												'brojPregleda'=>$brojPregleda
													]);
    	
}
    /**
	* Get Doctor data
	* 
	* @return data in array
    */
	public function promenaPodatakaDoktora(){
		$doktor = Auth::user()->id; 
		$data = DB::table('users')->where('id','=', $doktor)->get();
		return view('doktor/promenaPodatakaDoktora')->with('data',$data);

	}
	 /**
	* Update Doctor data
	* 
	* @return data in array
    */
	public function upisiPromenuDoktora(Request $request, $id){
		  $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'numeric|min:6|required',
            'password_confirmation'=>'numeric|min:6|required' 
        ]);
		$name = $request->name;
		$email  = $request->email;
		$password = $request->password;
		$password_confirmation = $request->password_confirmation;
		$idNadji = User::find($id);
		if ($password !== $password_confirmation) {
			
			return redirect()->back()->withSuccess('Lozinke se ne slazu');
		}
		else{
		$idNadji->update(array('name'=> $name,
								'email'=>$email,
								'password'=>bcrypt($password),
								'password_confirmation'=>bcrypt($password_confirmation)
	));
		return redirect()->back()->withSuccess('Uspešno ste promenili podatke');		
	}
   }
    
}
