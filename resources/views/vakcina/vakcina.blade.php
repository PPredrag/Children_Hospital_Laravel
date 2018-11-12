@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<h3 class="inline"><p class="naslov">Vakcinisanje Pacijenta</p></h3>
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
<p class="zeleno" id="sakri">{{session('success')}}</strong>
	@endif
	@foreach ($data as $da)
	<table  class="table table-striped">
		<thead>
			<tr>
				<th>Uzrast</th>
				<th id="sredrina">BCG</th>
				<th id="sredrina">HB</th>
				<th id="sredrina">DTP</th>
				<th id="sredrina">OPV</th>
				<th id="sredrina">MMR</th>
				<th id="sredrina">Hib</th>
				<th id="sredrina">DT</th>
				<th id="sredrina">dT</th>
			</tr>
		</thead>
		<tbody id="sredrina">
			<tr>
				<th>Po Rodjenju</th>
				<td><form action="{{url('bcg/'.$da->id)}}" method="get">
					<input type="hidden" name="" value="1">
					{{ csrf_field() }}
				<button type="submit" class="btn {{($da->bcg == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp B &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
				<!--HB--><td><form action="{{url('hbprva/'.$da->id)}}" method="post">
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
			<th>Drugi Mesec</th>
			<td></td>
			<td><form action="{{url('hbdruga/'.$da->id)}}" method="get">
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
			<th>Treći Mesec</th>
			<td></td>
			<td></td>
			<td><form action="{{url('dtpprva/'.$da->id)}}" method="get">
				<input type="hidden" name="" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtpprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></form></td>
			<td><form action="{{url('opvprva/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></form></td>
			<td></td>
			<td><form action="{{url('hibprva/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hibprva == 0) ? 'btn-danger' : 'btn-success'}}">&nbspPrva Doza&nbsp</button></form></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>Četvrti Mesec</th>
			<td></td>
			<td></td>
			<td><form action="{{url('dtpdruga/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtpdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></form></td>
			<td><form action="{{url('opvdruga/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></form></td>
			<td></td>
			<td><form action="{{url('hibdruga/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hibdruga == 0) ? 'btn-danger' : 'btn-success'}}">Druga Doza</button></form></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>Šesti Mesec</th>
			<td></td>
			<td><form action="{{url('hbtreca/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hbtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td><form action="{{url('dtptreca/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtptreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td><form action="{{url('opvtreca/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td></td>
			<td><form action="{{url('hibtreca/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->hibtreca == 0) ? 'btn-danger' : 'btn-success'}}">Treća Doza</button></form></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>12-15 Mesec</th>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('mmrb/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->mmrb == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp B &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>17-24 Mesec</th>
			<td></td>
			<td></td>
			<td><form action="{{url('dtpp1/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtpp1 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P1 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td><form action="{{url('opvp1/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvp1 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P1 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<th>7 Godina</th>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('opvp2/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvp2 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P2 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td><form action="{{url('mmrp/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->mmrp == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp&nbsp P &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td>
			<td></td>
			<td><form action="{{url('dtp2/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtp2 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P2 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td></td>
			<td></td>
		</tr>
		<tr>
			<th>12 Godina</th>
			<td></td>
			<td><form action="{{url('hbtridoze/'.$da->id)}}" method="get">
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
			<th>14 Godina</th>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('opvp3/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->opvp3 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P3 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><form action="{{url('dtp3/'.$da->id)}}" method="get">
				<input type="hidden" name="vakcina" value="1">
				{{ csrf_field() }}
			<button type="submit" class="btn {{($da->dtp3 == 0) ? 'btn-danger' : 'btn-success'}}">&nbsp&nbsp&nbsp&nbsp P3 &nbsp&nbsp&nbsp&nbsp&nbsp</button></form></td></td>
		</tr>
	</tbody>
</table>
<hr>
@endforeach
<div style="float: left;">
	<a href="{{route('izmenaVakcine')}}"><button type="submit" class="btn btn-primary"><i class=""></i> Izmeni Evidentirane Vakcine</button></a>
	<!--<a href=""><button type="submit" class="btn btn-success "><i class="fa fa-btn fa-print"></i> Štampa</button></a> --> </div>
	<form action="{{route('vakcinaCene')}}" method="post">
		<div style="float: right; display: inline-block;">
			<input type="hidden" value="{{ Session::get('vakcina') }}" name="vakcina">
			{{ csrf_field() }}
			<a href=""><button type="submit" class="btn btn-primary " style="float: right;" id="klik"><i class="fa fa-btn fa-money"></i> Naplata Pregleda</button></a>
		</div>
	</form>
</div>
</div>
@endsection
@section('footer')
<script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}"></script>
<script type="text/javascript" src="{{ asset('javaScript/naplataVakcina.js') }}"></script>
@endsection