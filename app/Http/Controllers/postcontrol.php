<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class postcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        $posts = Post::all();
        return view('home')->with('posts',$posts)->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post;
        $post->title = $request->get('title');
        $post->description = $request->get('message');
        $post->username = $request->get('username');
        $post->save();
        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where('post_id',$id)->get();
        $post = Post::find($id);
        return view('post')->with('post',$post)->with('comments',$comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit',compact('post'));

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
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->description = $request->get('message');
        $post->username = $request->get('username');
        $post->save();

        return redirect('/')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/')->with('success', 'Stock has been updated');
    }
    public function addcomments(Request $request){
        $comment = new Comment();
        $comment->message = $request->get('comment');
        $comment->user = $request->get('name');
        $comment->post_id = $request->get('id');
        $comment->save();
        return redirect('/post/'.$request->get('id'))->with('success', 'Stock has been updated');
    }
    public function delcomments(Request $request)
    {
        $id=$request->get('id');
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('/')->with('success', 'Stock has been updated');
    }
    public function users(){
        $posts = Post::all();
        $users = DB::table('posts')
            ->select('username')
            ->groupBy('username')
            ->get();
        return view('showUsers')->with('users',$users)->with('posts',$posts);
    }
    public function recent(){
        $date = Carbon::today()->subDays(30);
        $posts = Post::where('created_at', '>=', $date)->get();
        return view('/recents')->with('posts',$posts);
    }
}
