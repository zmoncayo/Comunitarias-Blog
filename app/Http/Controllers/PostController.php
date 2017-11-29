<?php

namespace Blog\Http\Controllers;

use Blog\Post;
use Illuminate\Http\Request;
use DB;
use Blog\Http\Requests\PostRequest;

use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Request $request)
    {
        
        
        $publicaciones = DB::table('posts')->join('users','userid','=','id')
        ->where([
            ['userid','=', Auth::user()->id],
            ['status','=','A'],
        ])
        ->select('posts.*','users.name')
        ->orderby('updated_at','desc')->paginate(5);
        return view('Post.index',["publicaciones"=>$publicaciones]);
    }

    public function all(Request $request)
    {
        $publicaciones = DB::table('posts')->join('users','userid','=','id')
        ->where('status','=','A')
        ->select('posts.*','users.name')
        ->orderby('updated_at','desc')->paginate(5);
        return view('Post.sisblog',["publicaciones"=>$publicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->userid = $request->userid;

        $post->save();

        return redirect('post')->with('msgs','Publicación creada exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (! $post) {
            abort(404);
        }
        return view('Post.edit',compact('post'));
    }


    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->description = $request->description;
        
        $post->update();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \blog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        $post->status = 'I';
        $post->update();

        return redirect()->route('post.index');
    }


}
