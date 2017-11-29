@extends('layouts.app')

@section('content')

            <div class="col-md-12">
               @include('Post.success')
                    <div class="panel panel-primary">
                      <div class="panel-heading">{{$publicacion->title}}</div>
                      <div class="panel-body">
                        {{$publicacion->description}}
                        <br></br> <hr>
                        <h6><strong>Creado:</strong> {{$publicacion->created_at}}</h6>
                      </div>
                      <div class="panel-footer ">
                        <ul>
                          @if($comentarios->count() > 0)
                            @foreach ($comentarios as $comentario)
                           <li class="">
                              Usuario <strong> {{ $comentario->name }}  </strong> comentó: <strong class="text-primary">{{ $comentario->body }}</strong> 
                              &nbsp &nbsp &nbsp &nbsp
                               <strong>  Fecha: </strong> {{ $comentario->created_at }}
                                
                                @if(Auth::user()->id==$comentario->userid)
                                  &nbsp <a href="{{URL::action('CommentController@edit',['id'=>$comentario->idcomment])}}">Editar</a> &nbsp 
                                  <a href="#modal-delete-{{$comentario->idcomment}}" data-toggle="modal">Eliminar</a>

                                @endif
                                <hr>
                            </li>
                                @include('comment.delete')
                             @endforeach 

                          @else
                            <li class="alert alert-success"> <h5>No hay publicaciones</h5></li>
                          @endif                          
                          
                        </ul>
                      </div>
                    </div>            
                      
                 <br></br>
                   @include('Post.delete')

            </div>

         
		

@endsection