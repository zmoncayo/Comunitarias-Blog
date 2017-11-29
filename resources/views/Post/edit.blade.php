@extends('layouts.app')

@section('content')
	
	@include('Post.error')
    @can('update', $post)
		    {!!Form::model($post,['method'=>'PATCH','route'=>['post.update',$post->idpost]])!!}
		   

		     @include('Post.form')

		    {!!Form::close()!!}
	@else
			<div class="alert alert-danger">Usuario no autorizado a editar esta publicación</div>
    @endcan
@endsection