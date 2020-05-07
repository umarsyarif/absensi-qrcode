<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TuController extends Controller
{
    public function index()
    {
        return view('tu.dashboard');
    }
}
