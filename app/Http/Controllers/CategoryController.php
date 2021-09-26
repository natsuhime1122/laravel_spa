<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('content.category');
    }

    public function create(Request $request)
    {
        dd($request->all());
    }
}
