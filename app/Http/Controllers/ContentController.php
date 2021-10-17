<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preset;

class ContentController extends Controller
{
    public function index()
    {
        $preset = new Preset();
        dd($preset->getEnablePresets());
        return view('content.index');
    }
}
