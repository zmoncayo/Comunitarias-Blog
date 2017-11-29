@extends('layouts.app')

@section('content')
	
	@include('Post.error')

		    {!!Form::model($comment,['method'=>'PATCH','route'=>['comment.update',$comment->idcomment]])!!}
		   
		    
		     @include('comment.form')

		    {!!Form::close()!!}
	

@endsection