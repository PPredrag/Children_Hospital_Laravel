@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<h3 class="inline"><p class="naslov">Izdate Potvrde</p></h3>
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
@if(count($data)>0)
<div class="col-md-10 col-md-offset-1">
	<table class="table table-striped">
		<thead>
			<tr>
				<th class="wrap">Dijagnoza</th>
				<th class="wrap">Doktor</th>
				<th class="wrap">Datum</th>
				<th class="wrap">Prikazi Potvrdu</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $da)
			<tr>
				<td class="wrap">{{$da->opis}}</td>
				<td class="wrap">{{$da->name}}</td>
				<td class="wrap">{{date('F d, Y', strtotime($da->created_at))}}</td>
				<td class="wrap">
					<a href="{{url('stampaPotvrde/'.$da->id)}}"><button type="button" class="btn btn-primary">Prikazi Potvrdu</button></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
</div>
<div class="col-md-6 col-md-offset-4">
{{ $data->links() }}
</div>
@else
<p class="crveno"><b>PACIJENT SA OVIM PODACIMA NEMA EVIDENTIRANE POTVRDE</b></p>
@endif
@endsection