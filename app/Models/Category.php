<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'english_name'];

    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
