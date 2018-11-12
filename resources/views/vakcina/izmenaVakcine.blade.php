@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<h3 class="inline"><p class="naslov" id="vakcinaPozadina">Izmena Primljenih Vakcina</p></h3>
		<table class="table">
			<tbody>
				<tr>
					<td>
					<div class="panel-heading" ><h3 class="inline">{{Session::get('ime') }} {{Session::get('roditelj') }} {{Session::get('prezime') }} {{Session::get('godiste') }} godiste</h3></td>
					<td>
						<a href="{{route('istorijaPacijenta')}}"> <button type="button" class="btn btn-primary" id="desno" >
							<i class="fa fa-btn fa-user"></i> Karton Pacijenta
						</button></a>
						<a href="{{route('vrstePregleda')}}"> <button type="button" class="btn btn-warning" id="desno" >
							<i class="fa fa-btn fa-user"></i> Novi Pregled
						</button></a>
						<a href="{{route('pacijent')}}"> <button type="button" class="btn btn-primary btn-md btn-success" id="desno" >
							<i class="fa fa-angle-double-left"></i> Pregled i Dijagnoza
						</button>  </a>
						
					</td>
				</div>
			</tr>
		</tbody>
	</table>
</div>
@if(session('success'))
<p class="crveno" id="sakri">{{session('success')}}</strong>
	@endif
	@foreach ($data as $da)
	<table  class="table table-striped">
		<thead>
			<tr>
				<th class="crvenoT">Uzrast</th>
				<th id="sredrina" class="crvenoT">BCG</th>
				<th id="sredrina" class="crvenoT">HB</th>
				<th id="sredrina" class="crvenoT">DTP</th>
				<th id="sredrina" class="crvenoT">OPV</th>
				<th id="sredrina" class="crvenoT">MMR</th>
				<th id="sredrina" class="crvenoT">Hib</th>
				<th id="sredrina" class="crvenoT">DT</th>
				<th id="sredrina" class="crvenoT">dT</th>
			</tr>
		</thead>
		<tbody id="sredrina">
			<tr>
				<th class="crvenoT">Po Rodjenju</th>
				<td><form action="{{url('bcg0/'.$da->id)}}" method="get">
					<input type="hidden" name="" value="1">
					{{ csrf_field() }}
				<button type="submit" class="btn {{($da->bcg == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp B &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
				<!--HB--><td><form action="{{url('hbprva0/'.$da->id)}}" method="post">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hbprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></form></td>
			
			<!--DTP--><td></td>
			<!--OPV--><td></td>
			<!--MMR--><td></td>
			<!--Hib--><td></td>
			<!--DT--><td></td>
			<!--dT--><td></td>
		</tr>
		<tr>
			<th class="crvenoT">Drugi Mesec</th>
			<td></td>
			<td><form action="{{url('hbdruga0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				<input type="hidden" value="{{Session::token()}}" name="_token">
				<button type="submit" class="btn {{($da->hbdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza
			</button></form></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">Treći Mesec</th>
			<td></td>
			<td></td>
			<td><form action="{{url('dtpprva0/'.$da->id)}}" method="get">
				<input type="hidden" name="" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtpprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></form></td>
			<td><form action="{{url('opvprva0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></form></td>
			<td></td>
			<td><form action="{{url('hibprva0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hibprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></form></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">Četvrti Mesec</th>
			<td></td>
			<td></td>
			<td><form action="{{url('dtpdruga0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtpdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></form></td>
			<td><form action="{{url('opvdruga0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></form></td>
			<td></td>
			<td><form action="{{url('hibdruga0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hibdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></form></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">Šesti Mesec</th>
			<td></td>
			<td><form action="{{url('hbtreca0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hbtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td><form action="{{url('dtptreca0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtptreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td><form action="{{url('opvtreca0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td></td>
			<td><form action="{{url('hibtreca0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hibtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">12-15 Mesec</th>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('mmrb0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->mmrb == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp B &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">17-24 Mesec</th>
			<td></td>
			<td></td>
			<td><form action="{{url('dtpp10/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtpp1 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P1 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td><form action="{{url('opvp10/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvp1 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P1 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">7 Godina</th>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('opvp20/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvp2 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P2 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td><form action="{{url('mmrp0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->mmrp == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp P &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td></td>
			<td><form action="{{url('dtp20/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtp2 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P2 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">12 Godina</th>
			<td></td>
			<td><form action="{{url('hbtridoze0/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hbtridoze == 0) ? 'btn-danger' : 'btn-success'}}">Tri Doze(0,1,6)</button></form></td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th class="crvenoT">14 Godina</th>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('opvp30/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvp3 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P3 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('dtp30/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtp3 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P3 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td></td>
		</tr>
	</tbody>
</table>
<hr>
@endforeach
<a href="{{route('upisZaVakcinu')}}"> <button type="button" class="btn btn-primary" >
	<i class="fa fa-btn fa-user"></i>Vakcinisanje Pacijenta
</button></a><br>
</div>
</div>
@endsection
@section('footer')
<script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}">
</script>
@endsection