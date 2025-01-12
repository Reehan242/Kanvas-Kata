<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        return view('dashboard.categories.index',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:2048',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:2048',
        ];
        
        

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if ($category->image != null) {
                Storage::delete($category->image);
            }
            $validatedData['image'] = $request->file('image')->store('category-images');
        }
        
        Category::where('id', $category->id)
            ->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        if ($category->image != null) {
            Storage::delete($category->image);
        }
        Category::destroy($category->id);

        return redirect('/dashboard/category')->with('success', "Category \"" . $category->name . "\" has been deleted");
    }
}
