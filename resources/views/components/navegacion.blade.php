
 
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="bg-success">
                    	<a href="{{URL::action('HomeController@index')}}">
                    		<i class="glyphicon glyphicon-home"></i> Dashboard
                    	</a>
                    </li>
                    <li class="bg-success">
                    	<a href="{{URL::action('PostController@index')}}">
                    		<i class="glyphicon glyphicon-user"></i> Mis publicaciones
                    	</a>
                    </li>
					<li class="bg-success">
						<a href="{{URL::action('PostController@create')}}">
							<i class="glyphicon glyphicon-file"></i> Crear Publicación
						</a>
					</li>
                    <li class="bg-success">
                        <a href="{{URL::action('PostController@all')}}">
                            <i class="glyphicon glyphicon-file"></i> ZuBlog
                        </a>
                    </li>
                </ul>
            </div>
    
    	