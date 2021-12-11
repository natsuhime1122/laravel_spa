<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preset;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryCreateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index')->with([
            'categories' => $categories
        ]);
    }

    public function new()
    {
        return view('admin.category.form');
    }

    public function create(CategoryCreateRequest $request)
    {
        $preset = new Preset();
        $enable_preset = $preset->getEnablePresets()->first();

        try {
            $category = new Category();
            $category->preset_id    = $enable_preset->id;
            $category->name         = $request->category_name;
            $category->english_name = $request->english_name;
            $category->del_flg      = 0;
            $category->save();
        } catch (\Exception $exception) {
            dd($exception);
        }

        return redirect()->route('admin.category.index');
    }
}
