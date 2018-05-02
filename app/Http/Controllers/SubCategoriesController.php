<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Brand;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = SubCategory::find($id);

        return view('subCategories.show', compact('sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = SubCategory::find($id);

        $brands = Brand::pluck('brand_name','id');

        return view('subCategories.edit', compact('sub_category','brands'));
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
//        dd($request->input('brand_list'));
        $this->validate($request, [
            'sub_cat_name' => 'required',
        ]);

        $sub_category = SubCategory::find($id);

        $sub_category->update($request->all());

        $sub_category->brands()->sync($request->input('brand_list'), false);

        return redirect('subcategories/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_category = SubCategory::find($id);

        $sub_category->brands()->detach();

        $sub_category->delete();

        return redirect()->back();
    }
}
