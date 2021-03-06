<?php

namespace Bitporch\Firefly\Controllers;

use Bitporch\Firefly\Models\Post;
use Bitporch\Firefly\Requests\Posts\CreatePostRequest;
use Bitporch\Firefly\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Set the middleware for the controller.
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'index', 'show',
        ]);
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->only([
            'discussion_id',
            'content',
        ]) + [
            'user_id' => $request->user()->id,
        ]);

        return redirect()->route('forum.discussions.show', $post->discussion->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('firefly::posts.edit')->with(compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post              $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('forum.discussions.show', $post->discussion->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('forum.discussions.show', $post->discussion->slug)
            ->with('success', 'Post deleted successfully.');
    }
}
