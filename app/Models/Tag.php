<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['name', 'english_name'];

    public function preset()
    {
        return $this->belongsTo(Preset::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'file_tag', 'tag_id', 'file_id');
    }
}
