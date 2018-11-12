<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Cenovnik;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class CenovnikController extends Controller
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
* Update prices in DB
*/
public function promenaCenovnika(){
  $data = DB::table('cenovniks')->get();
  foreach ($data as $key => $value) {
    $pregled = $value->pregled;
    $kraj = $value->krajPregled;
    $potvrda = $value->potvrda;
    $vakcina = $value->vakcina;
    $rane = $value->rane;
    $sistematski = $value->sistematski;
    $id = $value->id;
  }
  Session::put([
      'id'=>$id,
      'pregled'=>$pregled,
      'kraj'=>$kraj,
      'potvrda'=>$potvrda,
      'vakcina'=>$vakcina,
      'rane'=>$rane,
      'sistematski'=>$sistematski
  ]);
  return view('cenovnik/odabirCena')->with('id',$id);
}

/**
* UInsert New prices in DB
*/
public function noveCene(Request $request, $id){
    $pregled = $request->pregled;
    $kraj = $request->kraj;
    $potvrda = $request->potvrda;
    $vakcina = $request->vakcina;
    $rane = $request->rane;
    $sistematski = $request->sistematski;
    $podatak = DB::table('cenovniks')->where('id','=',$id)
                      ->update(array(
                  'pregled'=>$pregled,
                  'krajPregled'=>$kraj,
                  'potvrda'=>$potvrda,
                  'vakcina'=>$vakcina,
                  'rane'=>$rane,
                  'sistematski'=>$sistematski
                      ));
                      return redirect()->back()->withSuccess('Uspešno ste promenili cene');
}
}