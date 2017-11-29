@if(Session::has('msgs'))
	<div class="alert alert-success">
		<button type='button' class="close" data-dismiss="alert">
			&times;
		</button>

		<ul>
			<li>{{ Session::get('msgs') }}</li>
		</ul>
	</div>
@endif