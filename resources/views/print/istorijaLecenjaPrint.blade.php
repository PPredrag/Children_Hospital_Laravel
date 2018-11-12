@extends('layouts.printMain')
@section('content')
<div class="col-md-10 col-md-offset-1">
	<div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>  </div>
	<p class="textSredina"> <b> Nastavak Lecenja: {{date('F d, Y', strtotime(Session::get('vreme')))}}</b></p><br>
	<div class="form-group">
		<label for="comment">Lecenje</label>
		<textarea class="form-control" rows="5"  id="comment" name="simptomi" value="">{{ (Session::get('lecenje')) }}</textarea>
	</div>
	<div class="form-group">
		<label for="comment">Korišćeni Lekovi</label>
		<textarea class="form-control" rows="5" id="comment" name="dijagnoza" value="">{{ (Session::get('lek')) }}</textarea>
	</div>
</div>
@endsection