@if(count($data))
<table class="table table-bordered table-hover" id="tabela">
	<thead>
		<tr>
			<th class="wrap">Ime</th>
			<th class="wrap">Prezime</th>
			<th class="wrap">Ime Roditelja</th>
			<th class="wrap">Godina Rodjenja</th>
			<th class="wrap">Brisanje</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data as $da)
		
		<tr>
			<td class="wrap">{{ $da->ime }}</td>
			<td class="wrap">{{ $da->prezime }}</td>
			<td class="wrap">{{ $da->imeroditelja}}</td>
			<td class="wrap">{{ $da->god_rodjenja }}</td>
			<td class="wrap">
				<a href="{{ url('brisanjeJednogPacijenta/'.$da->id) }}"><button type="button" class="btn btn-danger"><i class="fa fa-btn fa-user"></i>Obriši Pacijenta</button></a>
			</td>
		</tr>
		@endforeach
		
	</tbody>
	
</table>
<div class="col-md-6 col-md-offset-4">
	{{ $data->render() }}
</div>
@else
<p class="crveno"><b>PACIJENT SA OVIM PODACIMA NE POSTOJI !!!!</b></p>
@endif