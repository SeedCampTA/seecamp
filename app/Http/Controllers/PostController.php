<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Http\Requests\StorePostRequest;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['comments' => function ($query) {
            $query->orderBy('updated_at', 'desc');
        }])->orderBy('updated_at', 'desc')->take(20)->get();

        $user_id = Auth::User()->id;
        foreach ($posts as $post) {
            if ($post->likeByUsers) {
                foreach ($post->likeByUsers as $user) {
                    if ($user->id == $user_id) {
                        $post->likeable = false;
                        break;
                    }
                }
            }
            if (!isset($post->likeable)) {
                $post->likeable = true;
            }
        }

        return view('post.newsfeed', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->all();
        $post = Auth::User()->posts()->create($data);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->getRealPath();
            $mime_type = $request->file('image')->getClientMimeType();
            $destination_path = 'posts/' . $post->id . $mime_type;
            Storage::put(
                $destination_path,
                file_get_contents($path)
            );
            $post->image = $destination_path;
            $post->save();
        }

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function like($id)
    {
        $post = Post::find($id);

        $post->likeByUsers()->attach(Auth::User()->id);

        return response()->json(1);
    }

    public function unlike($id)
    {
        $post = Post::find($id);

        $post->likeByUsers()->detach(Auth::User()->id);

        return response()->json(1);
    }
}
