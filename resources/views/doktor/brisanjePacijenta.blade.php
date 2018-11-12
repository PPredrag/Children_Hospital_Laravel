@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Brisanje Pacijenta iz Evidencije </h3>
			</div>
			@if(session('success'))
			<p class="zeleno" id="sakri">{{session('success')}}</strong>
				@endif
				<div class="panel-body">
					<div class="form-group">
						<input type="text" class="search" id="search" name="search" placeholder="Pretrazi Pacijenta">
					</div>
					<div id="rez">
						<div class="podaci">
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
$(document).ready(function(){
	$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
	$('#tabela').hide();
	$('.crveno').hide();
			$('#search').on('keyup',function(){
			var value = $('#search').val();
				if(value==""){
					$('#rez').hide();
				}
			else{
				$.ajax({
					async: true,
				type : 'get',
				url : '{{URL::to('search2')}}',
				data:{'search':value},
				success:function(data)
				{
				$('.podaci').html(data);
				$('#tabela').show();
				$('#rez').show();
				}
		});
	}
});

		$('#search').click(function(){
		$('#search').css("width", "500px");
		});
});
</script>
<script type="text/javascript" src="{{ asset('javaScript/sakri.js') }}"></script>
@endsection