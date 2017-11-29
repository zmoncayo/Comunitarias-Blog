@extends('layouts.app')

@section('content')
	
	@include('Post.error')

    {!!Form::open(array('url'=>'comment','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
     <input type="hidden" name="postid" value="{{ $_GET['id'] }}">
     @include('comment.form')

    {!!Form::close()!!}

@endsection