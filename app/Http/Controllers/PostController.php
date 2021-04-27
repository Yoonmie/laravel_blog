<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        return view('posts.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);

       $request->user()->posts()->create($request->only('body'));//user_id will be automatically added

       return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);//postpolicy.php/delete function
        $post->delete();

        return back();
    }
}
