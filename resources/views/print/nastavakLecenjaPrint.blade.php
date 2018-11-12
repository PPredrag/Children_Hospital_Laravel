@extends('layouts.printMain')
@section('content')
<div class="col-md-10 col-md-offset-1">
  <div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>  </div>
  <p class="textSredina"> <b> Nastavak Lecenja: {{date('F d, Y', strtotime(Session::get('vreme')))}}</b></p><br>
  
  <div class="form-group">
    <label for="simptomi"> Simptomi</label>
    <textarea class="form-control" rows="4"  id="simptomi" name="simptomi" >{{ Session::get('simptomi')}}</textarea>
  </div>
  <div class="form-group">
    <label for="comment">Dijagnoza</label>
    <textarea class="form-control" rows="4" id="comment" name="dijagnoza" >{{ Session::get('dijagnoza')}}</textarea>
  </div>
  <div class="form-group">
    <label for="comment">Lecenje</label>
    <textarea class="form-control" rows="4" id="comment" name="lecenje" >{{ Session::get('lecenje')}}</textarea>
  </div>
  <div class="form-group">
    <label for="lek">Medikamenti</label>
    <textarea class="form-control" rows="4" id="lek" name="lek" >{{ Session::get('lek')}}</textarea>
  </div>
</div>
@endsection