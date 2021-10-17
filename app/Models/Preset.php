<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preset extends Model
{
    protected $table = 'preset';
    protected $fillable = [
        'name',
        'current_enable_flg',
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'preset_id');
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'preset_id');
    }

    public function files()
    {
        return $this->hasmany(File::class, 'preset_id');
    }

    /**
     * 有効なプリセットを検索
     */
    public function searchEnablePresets()
    {
        return $this->where('current_enable_flg', 1);
    }

    /**
     * 有効なプリセットを取得
     */
    public function getEnablePresets()
    {
        return $this->searchEnablePresets()->get();
    }

    /**
     * 有効なプリセットが存在するか
     * @return bool
     */
    public function existsEnablePreset()
    {
        $enable_presets = $this->searchEnablePresets()->get();
        if ($enable_presets->count() === 0) {
            //現在有効なプリセットが１つもない状態
            return false;
        }
        return true;
    }

    /**
     * 全てのプリセットを無効化
     */
    public function resetEnablePreset()
    {
        $presets = self::all();
        foreach ($presets as $preset) {
            $preset->current_enable_flg = 0;
            $preset->save();
        }
    }

    /**
     * プリセット有効化(デフォルトは無効)
     * TODO:有効なプリセットがある場合無効化する
     */
    public function setEnablePreset($preset_id)
    {
        try {
            $preset = self::find($preset_id);
            $preset->current_enable_flg = 1;
            $preset->save();
        } catch (\Exception $exception) {
            //TODO:例外処理
            abort(404);
        }
    }

    /**
     * プリセット無効化
     */
    public function setDisablePreset($preset_id)
    {
        try {
            $preset = self::find($preset_id);
            $preset->current_enable_flg = 0;
            $preset->save();
        } catch (\Exception $exception) {
            //TODO:例外処理
            abort(404);
        }
    }
}
