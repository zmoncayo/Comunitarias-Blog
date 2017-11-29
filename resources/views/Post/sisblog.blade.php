@extends('layouts.app')

@section('content')
    <div class="page-content">
    	<div class="row">
		 
		  <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
			        <h1 class="text-primary">Publicaciones</h1>

			            <br>
			            <br>
			            <div class="col-md-12">
			                @foreach ($publicaciones as $publicacion)
			                    <div class="panel panel-primary">
			                      <div class="panel-heading">{{$publicacion->title}}</div>
			                      <div class="panel-body">
			                        {{$publicacion->description}}
			                        <br></br> <hr>
			                        <h6><strong>Publicado por:</strong>  {{$publicacion->name}}  <strong>Creado:</strong>  {{$publicacion->created_at}}  <strong>Ultima modificación:</strong> 
			                      {{$publicacion->updated_at}}</h6>
			                      </div>
			                      <div class="panel-footer ">
			                        <a href="{{URL::action('CommentController@show',$publicacion->idpost)}}">
			                                <button class="btn btn-info">Ver comentarios</button>
			                        </a>
			                        <a href="{{URL::action('CommentController@create',['id'=>$publicacion->idpost])}}">
			                                <button class="btn btn-primary">Agegar un comentarios</button>
			                        </a>
			                      </div>

			                    </div>            
			                      
			                 <br></br>
			                   @include('Post.delete')
			                @endforeach
			            </div>
			            {{$publicaciones->render()}}
		  		</div>
			</div>		
		 </div>  
		</div>
	</div>

@endsection