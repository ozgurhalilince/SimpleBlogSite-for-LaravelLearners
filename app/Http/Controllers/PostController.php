<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StorePostRequest $request)
    {        
        $requestData = $request->except('tags');
        
        $requestData['user_id'] = \Auth::user()->id;
        $requestData['slug'] = str_slug($request->title, '-');
        
        $post = Post::create($requestData);
        $post->tags()->attach($request->tags);

        return redirect('admin/yazilar')->with('success', 'Yazınız başarıyla eklendi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $post = Post::slug($slug)->first();
        if ($post == null) 
            abort(404);
        
        $post->update(['view_count' => $post->view_count + 1]);

        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     *
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $post = Post::slug($slug)->first();
        if ($post == null) 
            abort(404);

        $post_tag_ids = array_map( function ($value) { 
            return $value["id"];
        }, $post->tags->toArray());
        
        return view('admin.post.edit', compact('post', 'post_tag_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdatePostRequest $request)
    {        
        $requestData = $request->except('tags');
        $requestData['slug'] = str_slug($request->title, '-');
        
        $post = Post::findOrFail($id);
        $post->update($requestData);

        if ($post->slug == "hakkimda")    // if the post for about me
            return redirect('admin/hakkimda')->with('success', 'Hakkımda yazısı başarıyla güncellendi!');

        $post->tags()->sync($request->tags);
        return redirect('admin/yazilar')->with('success', 'Yazınız başarıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('admin/yazilar')->with('success', 'Yazı başarıyla silindi!');
    }
}
