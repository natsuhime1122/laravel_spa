<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'file_path', 'thumbnail_path'];

    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'file_tag', 'file_id', 'tag_id');
    }
}
