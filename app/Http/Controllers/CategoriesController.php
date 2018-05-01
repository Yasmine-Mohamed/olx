<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoriesController extends Controller
{

    /**
     * CategoriesController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        $select = [];

        foreach($categories as $category)
        {
            $select[$category->id] = $category->category_name;
        }

        return view('categories.create',compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check if subCategories belongs to parent category

        if ($request->input('parent_cat') != null) {

            $subCat = new SubCategory();

            $subCat->sub_cat_name = $request->input('category_name');

            $subCat->category_id = $request->input('parent_cat');

            $subCat->save();

            return redirect('/admin');
        }

        else {

            $cat = new Category();

            $cat->category_name = $request->input('category_name');

            $cat->save();

            return redirect('/admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('categories.show',compact('id'));
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
        $category = Category::find($id);

        $category->delete();

        return redirect('/admin');
    }
}
