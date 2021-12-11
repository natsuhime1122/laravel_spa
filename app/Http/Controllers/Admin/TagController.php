<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Preset;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()
            ->where('del_flg', 0)
            ->get();

        return view('admin.tag.index', [
            'tags' => $tags,
        ]);
    }

    public function new()
    {
        $categories = Category::query()
            ->where('del_flg', 0)
            ->get();

        return view('admin.tag.form', [
            'categories' => $categories,
        ]);
    }

    public function create(Request $request)
    {
        $preset = new Preset();
        $enable_preset = $preset->getEnablePresets()->first();

        try {
            $tag = new Tag();
            $tag->preset_id    = $enable_preset->id;
            $tag->category_id  = $request->parent_category_id;
            $tag->name         = $request->tag_name;
            $tag->english_name = $request->english_tag_name;
            $tag->del_flg      = 0;
            $tag->save();
        } catch (\Exception $exception) {
            dd($exception);
            report($exception);
        }

        return redirect( route('admin.tag.index') );
    }
}
