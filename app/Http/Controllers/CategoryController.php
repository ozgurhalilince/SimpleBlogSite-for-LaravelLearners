<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(StoreCategoryRequest $request)
    {
        $requestData = $request->all();
        $requestData["slug"] = str_slug($request->name, '-');
        
        Category::create($requestData);

        return redirect('admin/kategoriler')->with('success', 'Kategori başarıyla eklendi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $category = Category::slug($slug)->first();
        if ($category == null) 
            abort(404);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $category = Category::slug($slug)->first();
        if ($category == null) 
            abort(404);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, StoreCategoryRequest $request)
    {        
        $requestData = $request->all();
        $requestData["slug"] = str_slug($request->name, '-');
        
        $category = Category::findOrFail($id);
        $category->update($requestData);

        return redirect('admin/kategoriler')->with('success', 'Kategori başarıyla güncellendi!');
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
        Category::destroy($id);

        return redirect('admin/kategoriler')->with('success', 'Kategori başarıyla silindi!');
    }
}
