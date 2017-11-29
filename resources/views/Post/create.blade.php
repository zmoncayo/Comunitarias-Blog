@extends('layouts.app')

@section('content')
	
	@include('Post.error')

    {!!Form::open(array('url'=>'post','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}

     @include('Post.form')

    {!!Form::close()!!}

@endsection