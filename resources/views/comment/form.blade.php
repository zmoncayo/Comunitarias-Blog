<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
<div class="form-group">
	{!! Form::label('body','Descripción:') !!}
	{!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Escriba aquí su publicación...']) !!}
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" type="reset">Cancelar</button>
</div>
