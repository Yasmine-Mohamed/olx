<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * define admin guard
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admins.dashboard',compact('categories'));
    }
}
