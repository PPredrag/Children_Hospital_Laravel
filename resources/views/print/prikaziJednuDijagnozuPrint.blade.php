@extends('layouts.printMain')
@section('content')
<div class="col-md-10 col-md-offset-1">
	<div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>  </div>
	<p class="textSredina"> <b> Nastavak Lecenja: {{date('F d, Y', strtotime(Session::get('vreme')))}}</b></p><br>
	<div class="col-md-10 col-md-offset-1">
		<div class="form-group">
			<label for="comment">Dijagnoza</label>
			<textarea class="form-control" rows="5"  id="comment" name="simptomi" value="">{{ Session::get('dijagnoza') }}</textarea>
		</div>
	</div>
</div>
@endsection