<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::paginate(10);

        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCommentRequest $request)
    {        
        Comment::create($request->all());

        return back()->with('success', 'Yorum başarıyla eklendi!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {                
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return back()->with('success', 'Yorum başarıyla güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show($id)   //used for deleting
    {
        Comment::destroy($id);

        return back()->with('success', 'Yorum başarıyla silindi!');
    }
}
