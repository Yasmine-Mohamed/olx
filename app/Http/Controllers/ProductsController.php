<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
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
        $categories = Category::pluck('category_name','id')->toArray();

        $sub_categories = SubCategory::pluck('sub_cat_name','id')->toArray();

        $brands = Brand::pluck('brand_name','id')->toArray();


        return view('products.create',compact('categories','sub_categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $this->validate($request, [
            'image' => 'image|nullable|max:1999',
        ]);

        //Handle file upload

        if($request->hasFile('image')){

            //Get file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload images => store into /public
            $path = $request->file('image')->storeAs('/images/', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }




        // Create Product
        $product = new Product();
        $product->title = $request->input('title');
        $product->category_id = $request->input('category');
        $product->sub_category_id = $request->input('sub_category');
        $product->brand_id = $request->input('brand');
        $product->photo = $fileNameToStore;
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->condition = $request->input('condition');
        $product->city = $request->input('city');
        $product->name = $request->input('name');
        $product->phone = $request->input('phone');
        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

//        dd($product->user);

        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::pluck('category_name','id')->toArray();

        $sub_categories = SubCategory::pluck('sub_cat_name','id')->toArray();

        $brands = Brand::pluck('brand_name','id')->toArray();

        return view('products.edit',compact('product','categories','sub_categories','brands'));
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
        $this->validate($request, [
            'image' => 'image|nullable|max:1999',
        ]);

        //Handle file upload

        if($request->hasFile('image')){

            //Get file name with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();

            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload images => store into /public
            $path = $request->file('image')->storeAs('/images/', $fileNameToStore);
        }else {
            $fileNameToStore = 'noimage.jpg';
        }

        //Update Product

        $product = Product::find($id);

        $product->title = $request->input('title');
        $product->category_id = $request->input('category');
        $product->sub_category_id = $request->input('sub_category');
        $product->brand_id = $request->input('brand');
        $product->photo = $fileNameToStore;
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->condition = $request->input('condition');
        $product->city = $request->input('city');
        $product->name = $request->input('name');
        $product->phone = $request->input('phone');
        $product->user_id = auth()->user()->id;
        $product->save();

        return redirect('/products/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect('/');
    }
}
