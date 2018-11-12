@extends('layouts.printMain')
@section('content')
<br><br>
<div style="text-align: center;">
<div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>
</div>
<div class="container">
<div class="col-md-10 col-md-offset-1">
	<p class="textSredina"> <b> DATUM IZDAVANJA: {{date('F d, Y', strtotime(Session::get('vreme')))}}    </b></p><br>
	<label for="">Potvrda</label>
	<textarea name="potvrda" id="unos" cols="50" rows="5" class="form-control" value="" placeholder="">{{ Session::get('opis') }}</textarea><br>
</div>
</div>
@endsection