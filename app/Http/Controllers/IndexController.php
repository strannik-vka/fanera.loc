<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'setting' => Setting::first(),
            'categories' => Category::orderBy('sort', 'asc')->get()
        ]);
    }
}
