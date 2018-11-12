@extends('layouts.printMain')
@section('content')
<br><br>
<div style="text-align: center;">
<div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>
</div>
<div class="container">
<div class="col-md-10 col-md-offset-1">
  <p class="textSredina"> <b> DATUM IZDAVANJA: {{date('F d, Y', strtotime(Session::get('vreme')))}}    </b></p><br>
</div>
<div class="form-group col-xs-2 col-md-6" style="padding: 0; padding-right: 10px;">
  <label for="name" class="control-label">Godina:</label>
  <input type="text"  class="form-control" name="" placeholder="{{ Session::get('godina')}}" value="">
</div>
<div class="form-group col-xs-2 col-md-6" style="padding: 0; padding-right: 10px;">
  <label for="name" class="control-label">Mesec:</label>
  <input type="text"  class="form-control" name="tezina" placeholder="{{ Session::get('mesec')}}" value="">
</div>
<div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
  <label for="name" class="control-label">Težina Deteta:</label>
  <input type="text"  class="form-control" name="tezina" placeholder="{{ Session::get('tezina')}} kg" >
</div>
<div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
  <label for="name" class="control-label">Dužina Deteta:</label>
  <input type="text"  class="form-control" name="duzina" placeholder="{{ Session::get('duzina')}} cm" >
</div>
<div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 15px">
  <label for="name" class="control-label">Obim Glave:</label>
  <input type="text"  class="form-control" name="obim" placeholder="{{ Session::get('obim')}} cm" >
</div>
<div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 15px;">
  <label for="name" class="control-label">Ishrana:</label>
  <input type="text"  class="form-control" name="tezina" placeholder="{{ Session::get('ishrana')}}" value="">
</div>
<div class="form-group col-xs-4 col-md-4" style="padding: 0; padding-right: 10px;">
  <label for="name" class="control-label">Zubi:</label>
  <input type="text"  class="form-control" name="zubi" placeholder="{{ Session::get('zubi')}}" value="">
</div>
<div class="form-group" id="">
  <label for="krv">Vakcinisanje:</label>
  <textarea class="form-control" rows="3"  id="daa" name="vakcina">{{ Session::get('vakcina')}}</textarea>
</div>
<div class="form-group" id="">
  <label for="krv">Rezultati Krvne Slika:</label>
  <textarea class="form-control" rows="3"  id="unos" name="opis">{{ Session::get('krv1')}} {{ Session::get('krv2')}}</textarea>
</div>
<div class="form-group" id="">
  <label for="krv">Izvestaj Snimanja Kukova:</label>
  <textarea class="form-control" rows="3"  id="daa" name="kukovi">{{ Session::get('kukovi2')}} {{ Session::get('kukovi1')}}</textarea>
</div>
<div class="form-group" id="">
  <label for="krv">Izvestaj Sistematskog Pregleda</label>
  <textarea class="form-control" rows="3"  id="unos" name="opis">{{ Session::get('zakljucak')}}</textarea>
</div>
@endsection