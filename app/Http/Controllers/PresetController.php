<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preset;
use App\Http\Requests\PresetCreateRequest;
use Illuminate\Support\Facades\DB;

class PresetController extends Controller
{
    public function index()
    {
        $presets = Preset::get();

        return view('preset')->with([
            'presets' => $presets,
            // 'message' => $message ?? null,
        ]);
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

        return redirect()->route('preset.index');
    }

    public function enable(Request $request)
    {
        DB::beginTransaction();
        try {
            //一度全てのプリセットを無効化
            $preset_all = Preset::all();
            foreach ($preset_all as $preset) {
                $preset->current_enable_flg = 0;
                $preset->save();
            }

            //選択したプリセットを有効化
            $preset = Preset::find($request->preset_id);
            $preset->current_enable_flg = 1;
            $preset->save();

            DB::commit();
        } catch (\Exception $exception) {
            report($exception);
            DB::rollback();
        }

        return redirect()->route('content.index');

    }
}
