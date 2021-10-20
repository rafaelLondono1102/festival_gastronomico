<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('name','asc')->get();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type != 'admin'){
            Session::flash('failure', 'El usuario no tiene permiso para esta accion');
            return redirect(route('home'));
        }
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if(Auth::user()->type != 'admin'){
            Session::flash('failure', 'El usuario no tiene permiso para esta accion');
            return redirect(route('home'));
        }
        $inputs = $request->all();
        $category = new Category();
        $category->fill($inputs);
        $category->save();

        Session::flash('success', 'Categoria agregada exitosamente');

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $inputs = $request->all();
    
        $category->fill($inputs);
        $category->save();

        Session::flash('success', 'Categoria editada exitosamente');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->restaurants->isNotEmpty()){
            Session::flash('failure','No se puede borrar una categoria que esté en uso');
            return redirect(route('categories.index'));
        }
        $category->delete();
        Session::flash('success', 'categoria removido exitosamente');
        return redirect(route('categories.index'));
    }
}
