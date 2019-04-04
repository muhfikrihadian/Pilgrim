<!-- @if ($message = Session::get('error'))
<div class="container">
	<div class="card-panel">
		<span class="red-text text-darken-2"><strong>{{ $message }}</strong></span>
	</div>
</div>
@endif -->

@if ($message = Session::get('success'))
<script type="text/javascript">
	Materialize.toast('{{ $message }}', 1000, 'rounded')
</script>
@endif