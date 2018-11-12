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
use DB;
use Illuminate\Support\Facades\Session;
use App\Exceptions\Handler;
use Exception;
class AlergijeController extends Controller
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
	 * Get Alergie if Pacijent have or update data
	 *
	 * @return array 
	 */	
	public function prikaziAlergije(){
		$id_pacijenta = Session::get('id_pacijenta');
		try{
		$data = DB::table('alergijes')->where('id_pacijent', '=', $id_pacijenta)->get();
		
		$broj = count($data);
			if($broj == 0){
				$poruka = "Za Pacijenta jos uvek nije evidentirana Alergija";
			}else{
				foreach ($data as $key => $value) {
					$poruka = $value->napomene;
				}				
			}
			
			return view('include.prikaziAlergije')->with(['poruka'=>$poruka,
														  'data'=>$data
		])->withSuccess('Uspesno Ste Promenili Alergije');
			}
				catch(Exception $e){
					echo $e->getMessage();
		}
	}

	/**
    * Updata Alergije Data 
    *
    * @return array
	*/
	public function promeniAlergiju(Request $request, $id){
		try{
		$data = Alergije::find($id);
		$napomena = $request->alergija;
		$data->update(array('napomene'=>$napomena));
		return redirect()->back()->withSuccess('Uspesno ste promenili podatke');
	}
			catch(Exception $e){
					echo $e->getMessage();
		}
}
}