<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('admin.file.index');
    }

    public function new()
    {
        return view('admin.file.form');
    }
}
