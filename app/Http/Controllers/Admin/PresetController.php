<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PresetCreateRequest;
use App\Models\Preset;
use Illuminate\Http\Request;

class PresetController extends Controller
{
    public function index()
    {
        $presets = Preset::all();

        return view('admin.preset.index')->with([
            'presets' => $presets,
        ]);
    }

    public function new()
    {
        return view('admin.preset.form');
    }

    public function create(PresetCreateRequest $request)
    {

        try {
            $preset = new Preset();
            $preset->name               = $request->preset_name;
            $preset->current_enable_flg = 0;
            $preset->save();
            // $message = 'プリセットの登録に成功しました';
        } catch (\Exception $exception) {
            dd($exception);
            // $message = 'プリセットの登録に失敗しました';
        }

        return redirect()->route('admin.preset.index');
    }
}
