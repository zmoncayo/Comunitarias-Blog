@extends('layouts.app')

@section('content')

            <div class="col-md-12">
               @include('Post.success')
                @foreach ($publicaciones as $publicacion)
                    <div class="panel panel-primary">
                      <div class="panel-heading">{{$publicacion->title}}</div>
                      <div class="panel-body">
                        {{$publicacion->description}}
                        <br></br> <hr>
                        <h6><strong>Publicado por: </strong>{{$publicacion->name}} <strong>Creado:</strong> {{$publicacion->created_at}}</h6>
                      </div>
                      <div class="panel-footer ">
                        <a href="{{URL::action('PostController@edit',$publicacion->idpost)}}">
                                <button class="btn btn-info">Editar</button>
                        </a>
                        <a href="#modal-delete-{{$publicacion->idpost}}" data-toggle="modal">
                                <button class="btn btn-danger">Eliminar</button>
                        </a>
                      </div>
                    </div>            
                      
                 <br></br>
                   @include('Post.delete')
                @endforeach
            </div>
            {{$publicaciones->render()}}
         
		

@endsection