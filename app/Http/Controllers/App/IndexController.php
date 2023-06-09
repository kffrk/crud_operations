<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view('index.index');
    }
}
