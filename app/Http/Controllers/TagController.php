<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreTagRequest;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::paginate(10);

        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreTagRequest $request)
    {
        $requestData = $request->all();
        $requestData["slug"] = str_slug($request->name, '-');
        
        Tag::create($requestData);

        return redirect('admin/etiketler')->with('success', 'Kategori başarıyla eklendi!');
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
        $tag = Tag::slug($slug)->first();
        if ($tag == null) 
            abort(404);

        return view('admin.tag.show', compact('tag'));
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
        $tag = Tag::slug($slug)->first();
        if ($tag == null) 
            abort(404);

        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, UpdateTagRequest $request)
    {        
        $requestData = $request->all();
        $requestData["slug"] = str_slug($request->name, '-');
        
        $tag = Tag::findOrFail($id);
        $tag->update($requestData);

        return redirect('admin/etiketler')->with('success', 'Kategori başarıyla güncellendi!');
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
        Tag::destroy($id);

        return redirect('admin/etiketler')->with('success', 'Kategori başarıyla silindi!');
    }
}
