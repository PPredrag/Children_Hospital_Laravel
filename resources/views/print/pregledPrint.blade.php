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
<div class="col-md-10 col-md-offset-1">
  <br>
  
  <div class="form-group">
    <label for="simptomi"> Simptomi</label>
    <textarea class="form-control" rows="4"  id="unos" name="simptomi" >{{ Session::get('simptomi') }}</textarea>
  </div>
  <div class="form-group">
    <label for="comment">Dijagnoza</label>
    <textarea class="form-control" rows="4" id="unos" name="dijagnoza" >{{ Session::get('dijagnoza') }}</textarea>
  </div>
  <div class="form-group">
    <label for="comment">Lečenje</label>
    <textarea class="form-control" rows="4" id="unos" name="lecenje" >{{ Session::get('lecenje') }}</textarea>
  </div>
  
  <div class="form-group">
    <label for="lek">Medikamenti</label>
    <textarea class="form-control" rows="4" id="unos"" name="lek" >{{ Session::get('lek') }}</textarea>
  </div>
</div>

@endsection