<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
<div class="form-group">
	{!! Form::label('title','Título:') !!}
	{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Título...']) !!}
</div>
<div class="form-group">
	{!! Form::label('description','Descripción:') !!}
	{!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Escriba aquí su publicación...']) !!}
</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" type="reset">Cancelar</button>
</div>


