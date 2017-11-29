<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;
use Blog\Post;
use DB;
use Blog\Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->body = $request->body;
        $comment->postid = $request->postid;
        $comment->userid = $request->userid;

        $comment->save();

        return redirect('sisblog')->with('msgs','Commentario creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion = Post::find($id);

        $comentarios = DB::table('comments')->join('users','userid','=','id')
        ->where([
            ['postid','=', $id],
            ['status','=','A'],
        ])
        ->select('comments.*','users.name')
        ->orderby('updated_at','asc')->get();
        return view('Post.show',["publicacion"=>$publicacion,"comentarios"=>$comentarios]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        if (! $comment) {
            abort(404);
        }
        return view('comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $comment->body = $request->body;
        
        $comment->update();

        return redirect('/sisblog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->status = 'I';
        $comment->update();

        return redirect('/sisblog');
    }
}
