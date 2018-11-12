<table class="table table-bordered table-hover" id="memList">
  <thead>
    <tr class="sakri">
      <th scope="col"  class="wrap">Ime</th>
      <th scope="col" class="wrap">Prezime</th>
      <th scope="col" class="wrap">Ime Roditelja</th>
      <th scope="col" class="wrap">Godina Rodjenja</th>
      <th scope="col" class="wrap">Pregledaj Pacijenta</th>
      <th scope="col" class="wrap">Izmeni Podatke</th>
    </tr>
  </thead>
  <tbody>
    @if(count($members) > 0)
    @foreach($members as $member)
    <tr>
      <td class="wrap">{{ $member->ime }}</td>
      <td class="wrap">{{ $member->prezime }}</td>
      <td class="wrap">{{ $member->imeroditelja }}</td>
      <td class="wrap">{{ $member->god_rodjenja }}</td>
      
      <td class="wrap"><a href="{{ url('member/'.$member->id) }}"> <button type="button" class="btn btn-success" >
        <i class="fa fa-angle"></i> Pregledaj Pacijenta
      </button></a>
    </td>
    <td class="wrap">
      <a href="{{ url('promenaPodatakaPacijenta/'.$member->id)}}"> <button type="button" class="btn btn-warning" >
        <i class="fa fa-angle"></></i> Izmeni Podatke
      </button></a>
    </td>
    
  </tr>
  @endforeach
  @else
  <script type="text/javascript">
  $(document).ready(function(){
  $('.sakri').hide();
  });
  </script>
  <p class="crveno"><b>PACIJENT SA OVIM PODACIMA NE POSTOJI !!!!</b></p>
  @endif
</tbody>
</table>
<div class="col-md-6 col-md-offset-4">
{{ $members->links() }}
</div>